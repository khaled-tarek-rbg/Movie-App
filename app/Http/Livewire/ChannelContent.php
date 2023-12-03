<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Channel;
use App\Models\ChannelServer;
use App\Models\ChannelType;
use App\Models\Movie;
use Livewire\Component;

class ChannelContent extends Component
{
   public $categories ;

   public $all_movies;

   public  $channels ;
   public  $channelServers ;
   public  $channelServerUrl ;


   public $channelTypes;

   public function mount(){
    $this->channelTypes = ChannelType::all();
    $this->categories = Category::all();
    $this->all_movies = Movie::all();

   }
   public function channel($item){
    $this->channels = Channel::all()->where('channel_type_id',  $item['id']);

    //  dd($item['id']);
   }
   public function test($item){

 $this->channelServers = ChannelServer::all()->where('channel_id',  $item['id']);
    // dd($item['id']);
   }
   public function test2($item){

$this->channelServerUrl = $item['url'];
    // dd($item['url']);
   }

    public function render()
    {
        return view('livewire.channel-content');
    }


}
