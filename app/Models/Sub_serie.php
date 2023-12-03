<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_serie extends Model
{
    use HasFactory;

    public $guarded = [''];


    public function serie()
    {
        return $this->belongsTo(Serie::class, 'serie_id', 'id');
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id', 'id');
    }


    public function serieWatchServers()
    {
        return $this->hasMany(SerieWatchServer::class , 'eposide_id');
    }
    public function eposideDownloadServers()
    {
        return $this->hasMany(SerieDownloadServer::class , 'eposide_id');
    }
}
