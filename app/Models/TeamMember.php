<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'bio',
        'image_path',
        'sort_order',
        'facebook_url',
        'linkedin_url',
        'twitter_url'
    ];
}
