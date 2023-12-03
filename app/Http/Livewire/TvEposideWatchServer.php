<?php

namespace App\Http\Livewire;

use App\Models\TV;
use App\Models\TV_eposides;
use App\Models\TV_seasons;
use Livewire\Component;

class TvEposideWatchServer extends Component
{
    public $selectedTv = '';
    public $selectedEposide;
    public $selectedSeason;

    public $tvs ;
    public $eposides ;
    public $seasons ;

    public function mount(){

        $this->tvs = TV::all();

        if($this->selectedTv != ''){

            $this->eposides = TV_eposides::all()->where('tv_id' ,$this->selectedTv);
            $this->seasons = TV_seasons::all()->where('tv_id' ,$this->selectedTv);

        }else{
            $this->eposides =[];
            $this->seasons =[];
        }
    }
    public function render()
    {
        return view('livewire.tv-eposide-watch-server');
    }
    public function updatedSelectedTv(){

        $this->tvs = TV::all();

        if($this->selectedTv != ''){

            $this->eposides = TV_eposides::all()->where('tv_id' ,$this->selectedTv);
            $this->seasons = TV_seasons::all()->where('tv_id' ,$this->selectedTv);

        }else{
            $this->eposides =[];
            $this->seasons =[];
        }
    }

}
