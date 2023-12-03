<?php

namespace App\Http\Livewire;

use App\Models\SubType;
use App\Models\Type;
use Livewire\Component;

class MovieInput extends Component
{

    public $selectedType = '';
    public $types ;
    public $subtypes ;

    public $selectedSubType = '';

    public function mount(){
        $this->types = Type::all();

        if ($this->selectedType != '') {

            $this->subtypes = SubType::all()->where('type_id', $this->selectedType);
        } else {
            $this->subtypes = [];
        }
    }



    public function render()
    {
        return view('livewire.movie-input');
    }

    public function updatedSelectedType()
    {
        if ($this->selectedType != '') {

            $this->subtypes = SubType::all()->where('type_id', $this->selectedType);
        } else {
            $this->subtypes = [];
        }

    }

}
