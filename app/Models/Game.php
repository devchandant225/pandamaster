<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail_url',
        'thumbnail_path',
        'game_url',
        'demo_url',
        'rtp',
        'game_type',
        'is_hot',
        'is_new',
        'is_featured',
        'is_active',
        'play_count',
        'features',
        
        // Dynamic Page Sections
        'hero_title',
        'hero_subtitle',
        'hero_ctas',
        'sections',
        'how_to',
        'card_section_title',
        'card_section_content',
        'card_section_cards',
        'testimonials',
        'faqs',
        'special_title',
        'special_items',

        // SEO
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_schema',
    ];

    protected $casts = [
        'is_hot' => 'boolean',
        'is_new' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'play_count' => 'integer',
        'rtp' => 'decimal:2',
        
        // JSON Casts
        'features' => 'array',
        'hero_ctas' => 'array',
        'sections' => 'array',
        'how_to' => 'array',
        'card_section_cards' => 'array',
        'testimonials' => 'array',
        'faqs' => 'array',
        'special_items' => 'array',
        'meta_schema' => 'array',
    ];

    /**
     * Get the full thumbnail URL (either uploaded file or external URL).
     */
    public function getThumbnailAttribute(): string
    {
        if ($this->thumbnail_path) {
            return Storage::disk('public')->url($this->thumbnail_path);
        }
        
        return $this->thumbnail_url ?? '';
    }

    /**
     * Set the title attribute and auto-generate the slug.
     */
    public function setTitleAttribute($value): void
    {
        $this->attributes['title'] = $value;
        if (!isset($this->attributes['slug']) || empty($this->attributes['slug'])) {
            $this->attributes['slug'] = Str::slug($value);
        }
    }

    /**
     * Scope for active games.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for hot games.
     */
    public function scopeHot($query)
    {
        return $query->where('is_hot', true);
    }

    /**
     * Scope for new games.
     */
    public function scopeNew($query)
    {
        return $query->where('is_new', true);
    }

    /**
     * Scope for featured games.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Increment the play count.
     */
    public function incrementPlayCount(): void
    {
        $this->increment('play_count');
    }
}
