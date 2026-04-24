<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_category_id',
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
        'features' => 'array',
        'meta_schema' => 'array',
    ];

    /**
     * Get the full thumbnail URL (either uploaded file or external URL).
     */
    public function getThumbnailAttribute(): string
    {
        if ($this->thumbnail_path) {
            return Storage::url($this->thumbnail_path);
        }
        
        return $this->thumbnail_url ?? '';
    }

    /**
     * Get the category that owns the game.
     */
    public function gameCategory(): BelongsTo
    {
        return $this->belongsTo(GameCategory::class);
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
