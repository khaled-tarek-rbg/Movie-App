<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TV extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    public $guarded = [''];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'tv_categories', 'tv_id', 'cat_id');
    }
    public function seasons()
    {
        return $this->hasMany(TV_seasons::class, 'tv_id');
    }
    public function eposides()
    {
        return $this->hasMany(TV_eposides::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
    public function subtype()
    {
        return $this->belongsTo(SubType::class, 'subtype_id', 'id');
    }




}
