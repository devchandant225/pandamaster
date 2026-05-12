<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'image_alt',
        'cta_label',
        'cta_url',
        'stats',
        'faqs',
    ];

    protected $casts = [
        'stats' => 'array',
        'faqs' => 'array',
    ];
}
