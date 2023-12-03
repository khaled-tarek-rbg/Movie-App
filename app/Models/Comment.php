<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    public $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }
    use HasFactory;
}
