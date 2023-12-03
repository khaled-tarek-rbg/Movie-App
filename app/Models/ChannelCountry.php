<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelCountry extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function ChannelTypes(){
        return $this->hasMany(ChannelType::class);
    }
    public function Channels(){
        return $this->hasMany(Channel::class , 'channel_country_id' , 'id');
    }
}
