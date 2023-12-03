<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubType extends Model
{
    use HasFactory;

    protected $guarded = [''] ;


    public function type(){
        return  $this->belongsTo(Type::class , 'type_id' ,  'id');
    }

    public function movies()
    {
        return $this->hasMany(Movie::class , 'subtype_id','id');
    }
    public function series()
    {
        return $this->hasMany(Serie::class, 'subtype_id','id' ) ;
    }
    public function cartoons()
    {
        return $this->hasMany(Anime::class , 'subtype_id','id');
    }
    public function tvs()
    {
        return $this->hasMany(TV::class , 'subtype_id','id');
    }
}
