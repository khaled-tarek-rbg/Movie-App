<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeMovieDownloadServer extends Model
{
    use HasFactory;
    public $guarded = ['id'];

    public function AnimeMovieDownload(){
        return $this->belongsTo(Anime_movies::class, 'anime_movie_id' , 'id' );
    }
}
