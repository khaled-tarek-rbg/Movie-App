<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TVComment extends Model
{
    use HasFactory;

    public $guarded = [''];

    public function tv()
    {
        return $this->belongsTo(TV::class, 'tv_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
