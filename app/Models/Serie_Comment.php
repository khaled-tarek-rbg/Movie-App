<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie_Comment extends Model
{

    public $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function serie()
    {
        return $this->belongsTo(Serie::class, 'serie_id', 'id');
    }

    use HasFactory;
}
