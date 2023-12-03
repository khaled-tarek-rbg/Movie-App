<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TV_seasons extends Model
{
    use HasFactory;

    public $guarded = [''];

    public function tv()
    {
        return $this->belongsTo(TV::class, 'tv_id', 'id');
    }

    public function tv_eposides()
    {
        return $this->hasMany(TV_eposides::class, 'season_id');
    }
}
