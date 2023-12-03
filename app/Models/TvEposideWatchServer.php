<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvEposideWatchServer extends Model
{
    use HasFactory;

    public $guarded = [''];


    public function tv(){
        return $this->belongsTo(TV::class , 'tv_id' , 'id');
    }
    public function TvEposide(){
        return $this->belongsTo(TV_eposides::class , 'eposide_id' , 'id');
    }
    public function TvSeason(){
        return $this->belongsTo(TV_seasons::class , 'season_id' , 'id');
    }

}
