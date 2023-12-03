<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeComment extends Model
{
    use HasFactory;

    public $guarded = [''];

    public function anime()
    {
        return $this->belongsTo(Anime::class, 'anime_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
