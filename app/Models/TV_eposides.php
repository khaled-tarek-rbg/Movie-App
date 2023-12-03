<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TV_eposides extends Model
{
    use HasFactory;
    public $guarded = [''];

    public function tv()
    {
        return $this->belongsTo(TV::class, 'tv_id');
    }
    public function season()
    {
        return $this->belongsTo(TV_seasons::class, 'season_id');
    }
    public function comments()
    {
        return $this->hasMany(TV_eposides_comments::class);
    }


    public function servers()
    {
        return $this->hasMany(TvEposideWatchServer::class , 'eposide_id' , 'id');
    }
    public function downloadservers()
    {
        return $this->hasMany(TvEposideDownloadServer::class , 'eposide_id' , 'id');
    }
}
