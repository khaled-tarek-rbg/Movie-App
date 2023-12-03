<?php

namespace App\Http\Livewire;

use App\Models\Anime;
use App\Models\Anime_eposides;
use App\Models\Anime_seasons;
use Livewire\Component;

class AnimeEposideWatchServers extends Component
{
    public $animes;
    public $eposides;
    public $seasons;

    public $selectedAnime = '';
    public $selectedEposide = '';
    public $selectedSeason = '';

    public function mount(){
        $this->animes = Anime::all();

        if($this->selectedAnime != ''){
            $this->eposides = Anime_eposides::all()->where('anime_id' , $this->selectedAnime);
            $this->seasons = Anime_seasons::all()->where('anime_id' , $this->selectedAnime);
        }else{
            $this->eposides = [];
            $this->seasons = [];
        }

    }
    public function render()
    {
        return view('livewire.anime-eposide-watch-servers');
    }

    public function updatedSelectedAnime(){
        $this->animes = Anime::all();

        if($this->selectedAnime != ''){
            $this->eposides = Anime_eposides::all()->where('anime_id' , $this->selectedAnime);
            $this->seasons = Anime_seasons::all()->where('anime_id' , $this->selectedAnime);
        }else{
            $this->eposides = [];
            $this->seasons = [];

        }

    }
}
