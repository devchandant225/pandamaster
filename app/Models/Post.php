<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image_url',
        'excerpt',
        'author',
        'category_id',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_schema'
    ];

    protected $casts = [
        'meta_schema' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class)->orderBy('sort_order');
    }
}
