<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_key',
        'title',
        'subtitle',
        'description',
        'badge_text',
        'cta_primary_text',
        'cta_primary_url',
        'cta_secondary_text',
        'cta_secondary_url',
        'background_type',
        'background_url',
        'animation_type',
        'stats',
        'features',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'stats' => 'array',
        'features' => 'array',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Get active landing sections.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    /**
     * Get section by key.
     */
    public static function getByKey($key)
    {
        return static::active()->where('section_key', $key)->first();
    }

    /**
     * Get available section keys for admin form.
     */
    public static function getSectionKeys()
    {
        return [
            'hero' => 'Hero Section (Main Banner)',
            'features' => 'Features Section',
            'how_it_works' => 'How It Works Section',
            'testimonials' => 'Testimonials Section',
            'cta' => 'Call to Action Section',
        ];
    }

    /**
     * Get available animation types.
     */
    public static function getAnimationTypes()
    {
        return [
            'particles' => 'Particles Animation',
            'stars' => 'Stars Animation',
            'neon' => 'Neon Glow Effects',
            'pulse' => 'Pulse Animation',
            'floating' => 'Floating Elements',
            'none' => 'No Animation',
        ];
    }

    /**
     * Get available background types.
     */
    public static function getBackgroundTypes()
    {
        return [
            'gradient' => 'Gradient Background',
            'image' => 'Image Background',
            'video' => 'Video Background',
            'solid' => 'Solid Color',
        ];
    }
}
