<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Anime extends Model
{
    use HasTranslations;

    public $translatable = ['name'];
    public $guarded = [''];

    use HasFactory;


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'anime_categories', 'anime_id', 'cat_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
    public function subtype()
    {
        return $this->belongsTo(SubType::class, 'subtype_id', 'id');
    }
    public function seasons()
    {
        return $this->hasMany(Anime_seasons::class);
    }
}
