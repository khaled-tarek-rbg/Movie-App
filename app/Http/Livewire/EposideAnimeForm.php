<?php

namespace App\Http\Livewire;

use App\Models\Anime;
use App\Models\Anime_seasons;
use App\Models\Season;
use Livewire\Component;

class EposideAnimeForm extends Component
{
    public  $animes;
    public  $seasons;

    public $selectedAnime = '';
    public $selectedSeason = '';


    public function mount()
    {
        $this->animes = Anime::all();

        if ($this->selectedAnime !== '') {

            $this->seasons = Anime_seasons::all()->where('anime_id', $this->selectedAnime);
        } else {
            $this->seasons = [];
        }
    }


    public function updatedSelectedAnime()
    {
        if ($this->selectedAnime !== '') {

            $this->seasons = Anime_seasons::all()->where('anime_id', $this->selectedAnime);
        } else {
            $this->seasons = [];
        }
    }
    public function render()
    {
        return view('livewire.eposide-anime-form');
    }
}
