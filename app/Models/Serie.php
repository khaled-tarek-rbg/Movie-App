<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Serie extends Model
{
    use HasFactory;


    use HasTranslations;

    public $translatable = ['name'];
    public  $guarded = [''];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'series_categories', 'serie_id', 'cat_id');
    }


    public function subSeries()
    {
        return $this->hasMany(Sub_serie::class);
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
    public function subtype()
    {
        return $this->belongsTo(SubType::class, 'subtype_id', 'id');
    }
    public function servers()
    {
        return $this->hasMany(SerieWatchServer::class);
    }
    public function downloadServers()
    {
        return $this->hasMany(SerieDownloadServer::class);
    }
}
