<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $guarded = [''];

    protected $hidden = [
        'pivot',
    ];

    use HasTranslations;

    public $translatable = ['name'];



    public function categories()
    {
        return $this->belongsToMany(Category::class, 'movies_categories', 'movie_id', 'cat_id');
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
        return $this->hasMany(Server::class);
    }
    public function downloadsServers()
    {
        return $this->hasMany(ServerDownload::class);
    }


}
