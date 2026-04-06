<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingSectionController extends Controller
{
    /**
     * Display a listing of landing sections.
     */
    public function index()
    {
        $sections = LandingSection::orderBy('sort_order')->paginate(15);
        $sectionKeys = LandingSection::getSectionKeys();
        $animationTypes = LandingSection::getAnimationTypes();
        $backgroundTypes = LandingSection::getBackgroundTypes();
        
        return view('admin.landing-sections.index', compact(
            'sections',
            'sectionKeys',
            'animationTypes',
            'backgroundTypes'
        ));
    }

    /**
     * Show the form for creating a new section.
     */
    public function create()
    {
        $sectionKeys = LandingSection::getSectionKeys();
        $animationTypes = LandingSection::getAnimationTypes();
        $backgroundTypes = LandingSection::getBackgroundTypes();
        $usedKeys = LandingSection::pluck('section_key')->toArray();
        
        return view('admin.landing-sections.create', compact(
            'sectionKeys',
            'animationTypes',
            'backgroundTypes',
            'usedKeys'
        ));
    }

    /**
     * Store a newly created section.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_key' => 'required|unique:landing_sections,section_key',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'badge_text' => 'nullable|string|max:100',
            'cta_primary_text' => 'nullable|string|max:100',
            'cta_primary_url' => 'nullable|string|max:255',
            'cta_secondary_text' => 'nullable|string|max:100',
            'cta_secondary_url' => 'nullable|string|max:255',
            'background_type' => 'required|in:gradient,image,video,solid',
            'background_url' => 'nullable|string|max:255',
            'animation_type' => 'required|in:particles,stars,neon,pulse,floating,none',
            'stats' => 'nullable|array',
            'stats.*.value' => 'nullable|string|max:50',
            'stats.*.label' => 'nullable|string|max:100',
            'features' => 'nullable|array',
            'features.*.title' => 'nullable|string|max:100',
            'features.*.description' => 'nullable|string|max:255',
            'features.*.icon' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = $request->integer('sort_order', 0);

        LandingSection::create($validated);

        return redirect()->route('admin.landing-sections.index')
            ->with('success', 'Landing section created successfully.');
    }

    /**
     * Show the form for editing the specified section.
     */
    public function edit(LandingSection $landingSection)
    {
        $sectionKeys = LandingSection::getSectionKeys();
        $animationTypes = LandingSection::getAnimationTypes();
        $backgroundTypes = LandingSection::getBackgroundTypes();
        
        return view('admin.landing-sections.edit', compact(
            'landingSection',
            'sectionKeys',
            'animationTypes',
            'backgroundTypes'
        ));
    }

    /**
     * Update the specified section.
     */
    public function update(Request $request, LandingSection $landingSection)
    {
        $validated = $request->validate([
            'section_key' => 'required|unique:landing_sections,section_key,' . $landingSection->id,
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'badge_text' => 'nullable|string|max:100',
            'cta_primary_text' => 'nullable|string|max:100',
            'cta_primary_url' => 'nullable|string|max:255',
            'cta_secondary_text' => 'nullable|string|max:100',
            'cta_secondary_url' => 'nullable|string|max:255',
            'background_type' => 'required|in:gradient,image,video,solid',
            'background_url' => 'nullable|string|max:255',
            'animation_type' => 'required|in:particles,stars,neon,pulse,floating,none',
            'stats' => 'nullable|array',
            'stats.*.value' => 'nullable|string|max:50',
            'stats.*.label' => 'nullable|string|max:100',
            'features' => 'nullable|array',
            'features.*.title' => 'nullable|string|max:100',
            'features.*.description' => 'nullable|string|max:255',
            'features.*.icon' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = $request->integer('sort_order', 0);

        $landingSection->update($validated);

        return redirect()->route('admin.landing-sections.index')
            ->with('success', 'Landing section updated successfully.');
    }

    /**
     * Remove the specified section.
     */
    public function destroy(LandingSection $landingSection)
    {
        $landingSection->delete();

        return redirect()->route('admin.landing-sections.index')
            ->with('success', 'Landing section deleted successfully.');
    }

    /**
     * Toggle section active status.
     */
    public function toggleStatus(LandingSection $landingSection)
    {
        $landingSection->update(['is_active' => !$landingSection->is_active]);

        return back()->with('success', 'Section status updated.');
    }
}
