<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Channel extends Model
{
    use HasFactory;



    public $guarded = [''];

    public function channelCountry(){
        return $this->belongsTo(ChannelCountry::class , 'channel_country_id' , 'id');
    }
    public function channelType(){
        return $this->belongsTo(ChannelType::class , 'channel_type_id' , 'id');
    }
    public function channelServers(){
        return $this->hasMany(ChannelServer::class , 'channel_id' , 'id');
    }
}
