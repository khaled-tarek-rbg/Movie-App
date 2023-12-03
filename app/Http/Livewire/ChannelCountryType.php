<?php

namespace App\Http\Livewire;

use App\Models\ChannelCountry;
use App\Models\ChannelType;
use Livewire\Component;

class ChannelCountryType extends Component
{

    public $selectedCountry = '';
    public $selectedType;

    public $channelsCountries;
    public $channelsTypes;


    public function mount(){
        $this->channelsCountries = ChannelCountry::all();

        if($this->selectedCountry !== ''){

            $this->channelsTypes = ChannelType::all()->where('channel_country_id' , $this->selectedCountry);

        }else{
            $this->channelsTypes = [];
        }
    }
    public function render()
    {
        return view('livewire.channel-country-type');
    }

    public function updatedSelectedCountry(){
        if($this->selectedCountry !== ''){

            $this->channelsTypes = ChannelType::all()->where('channel_country_id' , $this->selectedCountry);

        }else{
            $this->channelsTypes = [];
        }
    }
}
