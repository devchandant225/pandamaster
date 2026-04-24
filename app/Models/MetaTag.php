<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaTag extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'keyword',
        'image',
        'schema_head',
        'schema_body',
        'page_type',
        'is_active'
    ];

    protected $casts = [
        'schema_head' => 'array',
        'schema_body' => 'array',
        'is_active' => 'boolean'
    ];

    /**
     * Get array of Schema Head JSON-LD strings.
     */
    public function getSchemaHeadJsonAttribute()
    {
        if (empty($this->schema_head)) {
            return [];
        }
        return is_array($this->schema_head) ? $this->schema_head : [$this->schema_head];
    }

    /**
     * Get array of Schema Body JSON-LD strings.
     */
    public function getSchemaBodyJsonAttribute()
    {
        if (empty($this->schema_body)) {
            return [];
        }
        return is_array($this->schema_body) ? $this->schema_body : [$this->schema_body];
    }

    /**
     * Scope to get active meta tags
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get page types for admin form
     */
    public static function getPageTypes()
    {
        return [
            'home' => 'Home Page',
            'about' => 'About Page',
            'games' => 'Games Listing Page',
            'game' => 'Game Detail Page',
            'blog' => 'Blog Listing',
            'post' => 'Blog Post',
            'dashboard' => 'Player Dashboard',
            'register' => 'Registration Page',
            'login' => 'Login Page',
            'privacy' => 'Privacy Policy',
            'terms' => 'Terms & Conditions',
            'responsible-gaming' => 'Responsible Gaming',
            'play-online' => 'Play Online Page',
            'download' => 'Download Page',
            'casino' => 'Casino Page',
            'contact' => 'Contact Page',
            '777' => '777 Page',
            'investors' => 'Investors Page',
            'tools' => 'Tools Page',
        ];
    }

    /**
     * Get meta tag by page type
     */
    public static function getByPageType($pageType)
    {
        return static::active()->where('page_type', $pageType)->first();
    }
}
