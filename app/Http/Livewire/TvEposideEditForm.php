<?php

namespace App\Http\Livewire;

use App\Models\TV;
use App\Models\TV_seasons;
use Livewire\Component;

class TvEposideEditForm extends Component
{
    public $element;
    public $selectedTv;
    public $selectedSeason;
    public $seasons;
    public $tvs;

    public function mount($eposide)
    {
        $this->element = $eposide;
        $this->selectedTv = $eposide->tv->id;
        $this->selectedSeason = $eposide->season_id;
        $this->tvs = TV::all();
        $this->seasons = TV_seasons::all()->where('tv_id', $this->selectedTv);
    }

    public function updatedSelectedTv()
    {
        $this->seasons = TV_seasons::all()->where('tv_id', $this->selectedTv);
    }

    public function render()
    {
        return view('livewire.tv-eposide-edit-form');
    }
}
