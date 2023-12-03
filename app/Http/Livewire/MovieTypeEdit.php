<?php

namespace App\Http\Livewire;

use App\Models\SubType;
use App\Models\Type;
use Livewire\Component;

class MovieTypeEdit extends Component
{
    public $movie;
    public $type;
    public $subtype;

    public $types;
    public $subtypes;

    public function mount($movie){
        $this->movie = $movie;

        $this->type = $movie->type_id;
        $this->subtype = $movie->subtype_id;
        $this->subtypes = SubType::all()->where('type_id' , $this->type);

        $this->types = Type::all();
    }
    public function render()
    {
        return view('livewire.movie-type-edit');
    }

    public function updatedType(){
        $this->subtypes = SubType::all()->where('type_id' , $this->type);
    }
}
