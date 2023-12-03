<?php

namespace App\Http\Livewire;

use App\Models\ChannelCountry;
use App\Models\ChannelType;
use Livewire\Component;

class ChannelCountryTypeEdit extends Component
{
    public $selectedCountry ;
    public $selectedType ;

    public $channel;

    public $channelsCountries;
    public $channelsTypes = [];


    public function mount($channel){
        $this->channel = $channel;
        $this->selectedCountry = $channel->channel_country_id;
        $this->selectedType = $channel->channel_type_id;
        $this->channelsCountries = ChannelCountry::all();
    }
    public function render()
    {
        return view('livewire.channel-country-type-edit');
    }

    public function updatedSelectedCountry(){

        $this->channelsTypes = ChannelType::all()->where('channel_country_id' , $this->selectedCountry );

    }
}
