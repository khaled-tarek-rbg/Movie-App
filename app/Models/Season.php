<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    public $guarded = [''];

    public function serie()
    {
        return $this->belongsTo(Serie::class, 'serie_id', 'id');
    }

    public function subSeries()
    {
        return $this->hasMany(Sub_serie::class);
    }

    
}
