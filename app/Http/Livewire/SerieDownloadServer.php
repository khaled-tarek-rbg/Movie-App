<?php

namespace App\Http\Livewire;

use App\Models\Season;
use App\Models\Serie;
use App\Models\Sub_serie;
use Livewire\Component;

class SerieDownloadServer extends Component
{

    public $selectedSerie = '';
    public $series ;
    public $seasons ;
    public $selectedSeason ;
    public $subseries ;

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
        return view('livewire.serie-download-server');
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
