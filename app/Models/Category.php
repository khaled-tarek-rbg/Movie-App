<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $guarded = [''];
    protected $hidden = [
        'pivot',

    ];


    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movies_categories', 'cat_id', 'movie_id');
    }
    public function anime_movies()
    {
        return $this->belongsToMany(Anime_movies::class, 'anime_movies_categories', 'cat_id', 'anime_movie_id');
    }

    public function series()
    {
        return $this->belongsToMany(Serie::class, 'series_categories', 'cat_id', 'serie_id');
    }

    public function animes()
    {
        return $this->belongsToMany(Anime::class, 'anime_categories', 'cat_id', 'anime_id');
    }
    public function tvs()
    {
        return $this->belongsToMany(TV::class, 'tv_categories', 'cat_id', 'tv_id');
    }
}
