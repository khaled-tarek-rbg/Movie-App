<?php

namespace App\Http\Livewire;

use App\Models\TV;
use App\Models\TV_seasons;
use Livewire\Component;

class TvEposideForm extends Component
{
    public  $tvs;
    public  $seasons;

    public $selectedTv = '';
    public $selectedSeason = '';


    public function mount()
    {
        $this->tvs = TV::all();

        if ($this->selectedTv != '') {

            $this->seasons = TV_seasons::all()->where('tv_id', $this->selectedTv);
        } else {
            $this->seasons = [];
        }
    }


    public function updatedSelectedTv()
    {
        if ($this->selectedTv != '') {

            $this->seasons = TV_seasons::all()->where('tv_id', $this->selectedTv);
        } else {
            $this->seasons = [];
        }
    }








































    public function render()
    {
        return view('livewire.tv-eposide-form');
    }
}
