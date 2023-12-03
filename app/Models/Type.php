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
    public function movies()
    {
        return $this->hasMany(Movie::class , 'type_id','id');
    }
    public function series()
    {
        return $this->hasMany(Serie::class, 'type_id','id' ) ;
    }
    public function cartoons()
    {
        return $this->hasMany(Anime::class , 'type_id','id');
    }
    public function tvs()
    {
        return $this->hasMany(TV::class , 'type_id','id');
    }
}
