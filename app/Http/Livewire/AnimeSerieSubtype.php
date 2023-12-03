<?php

namespace App\Http\Livewire;

use App\Models\SubType;
use App\Models\Type;
use Livewire\Component;

class AnimeSerieSubtype extends Component
{
    public $types;
    public $subtypes;
    public $selectedType = "";
    public $selectedSubType = "";


    public function mount(){

        $this->types = Type::all();


        if($this->selectedType == ""){

            $this->subtypes = [];

        }else{
            $this->subtypes = SubType::all()->where('type_id' , $this->selectedType);
        }

    }

    public function render()
    {
        return view('livewire.anime-serie-subtype');
    }
    public function updatedSelectedType(){
        if($this->selectedType == ""){

            $this->subtypes = [];

        }else{
            $this->subtypes = SubType::all()->where('type_id' , $this->selectedType);
        }
    }
}
