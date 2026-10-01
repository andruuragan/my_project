<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'title_ru',

        'slug',

        'excerpt',
        'excerpt_ru',

        'content',
        'content_ru',

        'image',

        'is_published',
        'published_at',
    ];

   protected $casts = [
    'is_published' => 'boolean',
    'published_at' => 'date',
];
}