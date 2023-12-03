<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TV_eposides_comments extends Model
{
    use HasFactory;

    public $guarded = [''];

    public function tvEposide()
    {
        return $this->belongsTo(TV_eposides::class, 'tv_eposide_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
