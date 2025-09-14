<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieNews extends Model
{
    protected $table = 'movie_news';

    protected $fillable = [
        'title',
        'summary',
        'content',
        'movie_title',
        'genre',
        'release_date',
        'director',
        'image_url',
        'author',
        'reference_link',
    ];

    protected $casts = [
        'release_date' => 'date',
    ];
}
