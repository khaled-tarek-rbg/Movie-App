<?php

namespace App\Http\Livewire;

use App\Models\Season;
use App\Models\Serie;
use Livewire\Component;

class EposideForm extends Component
{

    public  $series;
    public  $seasons;

    public $selectedSerie = '';
    public $selectedSeason = '';


    public function mount()
    {
        $this->series = Serie::all();

        if ($this->selectedSerie !== '') {

            $this->seasons = Season::all()->where('serie_id', $this->selectedSerie);
        } else {
            $this->seasons = [];
        }
    }


    public function updatedSelectedSerie()
    {
        if ($this->selectedSerie !== '') {

            $this->seasons = Season::all()->where('serie_id', $this->selectedSerie);
        } else {
            $this->seasons = [];
        }
    }


    public function render()
    {
        return view('livewire.eposide-form');
    }
}
