<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeSeasonComment extends Model
{
    use HasFactory;

    public $guarded = [''];

    public function anime_season()
    {
        return $this->belongsTo(Anime_seasons::class, 'anime_season_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
