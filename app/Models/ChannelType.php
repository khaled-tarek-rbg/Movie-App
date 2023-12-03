<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelType extends Model
{
    use HasFactory;


    protected $guarded = [''];


    public function channelCountry(){
        return $this->belongsTo(ChannelCountry::class , 'channel_country_id' , 'id');
    }
    public function Channels(){
        return $this->hasMany(Channel::class);
    }
}
