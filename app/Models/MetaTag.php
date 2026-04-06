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
            'contact' => 'Contact Page',
            'investors' => 'Investor Deals Page',
            'tools' => 'Tools Page',
            'city' => 'City Page',
            'property' => 'Property Detail Page',
            'properties' => 'Properties Listing',
            'blog' => 'Blog Listing',
            'post' => 'Blog Post',
            'privacy' => 'Privacy Policy',
            'terms-condition' => 'Terms & Conditions'
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
