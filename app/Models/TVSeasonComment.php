<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TVSeasonComment extends Model
{
    use HasFactory;
    public $guarded = [''];

    public function tvSeason()
    {
        return $this->belongsTo(TV_seasons::class, 'tv_season_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
