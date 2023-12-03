<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public $guarded = [''];

    public function subtypes()
    {
        return $this->hasMany(SubType::class);
    }
   
}
