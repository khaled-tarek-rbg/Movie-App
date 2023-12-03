<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime_eposides extends Model
{
    use HasFactory;

    public $guarded = [''];

    public function season()
    {
        return $this->belongsTo(Anime_seasons::class, 'season_id', 'id');
    }
    public function anime()
    {
        return $this->belongsTo(Anime::class, 'anime_id', 'id');
    }
    public function watchServers()
    {
        return $this->hasMany(AnimeEposideWatchServer::class , 'eposide_id' , 'id');
    }

    public function downloadServers()
    {
        return $this->hasMany(AnimeEposideDownloadServer::class , 'eposide_id' , 'id');
    }
}
