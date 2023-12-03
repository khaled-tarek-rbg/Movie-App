<?php

namespace App\Http\Livewire;

use App\Models\Season;
use App\Models\Serie;
use Livewire\Component;

class EposideEditForm extends Component
{

    public $searchItem;
    public $seasonItem;
    public $seasons;
    public $series;
    public $eposide;

    public function mount($eposide)

    {
        $this->eposide = $eposide;


        $this->searchItem = $eposide->serie_id;
        $this->seasonItem = $eposide->season_id;

        $this->series = Serie::all();
        $this->seasons = Season::all()->where('serie_id', $this->searchItem);
    }


    public function updatedSearchItem()
    {
        $this->seasons = Season::all()->where('serie_id', $this->searchItem);
    }



    public function render()
    {
        return view('livewire.eposide-edit-form');
    }
}
