<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eposide_Comment extends Model
{
    public $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function eposide()
    {
        return $this->belongsTo(Sub_serie::class, 'eposide_id', 'id');
    }
    use HasFactory;
}
