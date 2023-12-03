<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Anime_movies extends Model
{
    use HasFactory;

    use HasTranslations;
    public $translatable = ['name'];


    public $guarded = [''];

    public function type()
    {

        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'anime_movies_categories', 'anime_movie_id', 'cat_id');
    }

    public function AnimeWatchServers()
    {
        return $this->hasMany(AnimeMovieWatchServer::class , 'anime_movie_id' , 'id');
    }
    public function AnimeDownloadsServers()
    {
        return $this->hasMany(AnimeMovieDownloadServer::class , 'anime_movie_id' , 'id');
    }
}
