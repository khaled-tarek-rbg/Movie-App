<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelServer extends Model
{
    use HasFactory;


    protected $guarded = [''];

    public function Channel(){
        return $this->belongsTo(Channel::class , 'channel_id' , 'id');
    }
}
