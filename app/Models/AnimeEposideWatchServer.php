<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeEposideWatchServer extends Model
{
    use HasFactory;


    public $guarded = ['id'];

    public function AnimeEposide(){
        return $this->belongsTo(Anime_eposides::class, 'eposide_id' , 'id' );
    }
}
