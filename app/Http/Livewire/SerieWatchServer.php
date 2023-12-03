<?php

namespace App\Http\Livewire;

use App\Models\Season;
use App\Models\Serie;
use App\Models\Sub_serie;
use Livewire\Component;

class SerieWatchServer extends Component
{

    public $selectedSerie = '';
    public $series ;
    public $subseries ;
    public $seasons ;
    public $selectedSeason ;

    public $selectedsubseries = '';

    public function mount(){
        $this->series = Serie::all();

        if ($this->selectedSerie != '') {

            $this->subseries = Sub_serie::all()->where('serie_id', $this->selectedSerie);
            $this->seasons = Season::all()->where('serie_id', $this->selectedSerie);
        } else {
            $this->subseries = [];
            $this->seasons = [];
        }
    }
        public function render()
    {
        return view('livewire.serie-watch-server');
    }

    public function updatedselectedSerie()
    {
        if ($this->selectedSerie != '') {

            $this->subseries = Sub_serie::all()->where('serie_id', $this->selectedSerie);
            $this->seasons = Season::all()->where('serie_id', $this->selectedSerie);

        } else {
            $this->subseries = [];
            $this->seasons = [];

        }

    }
}
