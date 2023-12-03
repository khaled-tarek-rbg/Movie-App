<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime_seasons extends Model
{
    use HasFactory;

    public $guarded = [''];
    
    public function anime()
    {
        return $this->belongsTo(Anime::class, 'anime_id', 'id');
    }


    public function eposides()
    {
        return $this->hasMany(Anime_eposides::class, 'season_id');
    }
}
