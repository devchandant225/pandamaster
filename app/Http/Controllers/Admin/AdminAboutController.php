<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    /**
     * Show the form for editing the about page.
     */
    public function edit()
    {
        $about = AboutPage::first();
        if (!$about) {
            $about = new AboutPage();
        }
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the about page content.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|string',
            'image_alt' => 'nullable|string|max:255',
            'cta_label' => 'nullable|string|max:255',
            'cta_url' => 'nullable|string|max:255',
            'stats' => 'nullable|array',
            'faqs' => 'nullable|array',
        ]);

        // Clean up empty JSON fields
        if (isset($validated['stats'])) {
            $validated['stats'] = array_values(array_filter($validated['stats'], function($item) {
                return !empty($item['label']) || !empty($item['value']);
            }));
        }

        if (isset($validated['faqs'])) {
            $validated['faqs'] = array_values(array_filter($validated['faqs'], function($item) {
                return !empty($item['question']) || !empty($item['answer']);
            }));
        }

        $about = AboutPage::first();
        if ($about) {
            $about->update($validated);
        } else {
            AboutPage::create($validated);
        }

        return redirect()->route('admin.about.edit')
            ->with('success', 'About page updated successfully.');
    }
}
