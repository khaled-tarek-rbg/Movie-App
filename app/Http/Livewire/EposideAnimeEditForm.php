<?php

namespace App\Http\Livewire;

use App\Models\Anime;
use App\Models\Anime_seasons;
use Livewire\Component;

class EposideAnimeEditForm extends Component
{

    public $selectedAnime;
    public $selectedSeason;
    public $seasons;
    public $animes;
    public $eposide;

    public function mount($eposide)

    {
        $this->eposide = $eposide;


        $this->selectedAnime = $eposide->anime_id;
        $this->selectedSeason = $eposide->season_id;

        $this->animes = Anime::all();
        $this->seasons = Anime_seasons::all()->where('anime_id', $this->selectedAnime);
    }


    public function updatedselectedAnime()
    {
        $this->seasons = Anime_seasons::all()->where('anime_id', $this->selectedAnime);
    }





    public function render()
    {
        return view('livewire.eposide-anime-edit-form');
    }
}
