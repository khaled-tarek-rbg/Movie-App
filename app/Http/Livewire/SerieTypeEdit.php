<?php

namespace App\Http\Livewire;

use App\Models\SubType;
use App\Models\Type;
use Livewire\Component;

class SerieTypeEdit extends Component
{
    public $serie;
    public $type;
    public $subtype;

    public $types;
    public $subtypes;
    public function mount($serie){
        $this->serie = $serie;

        $this->type = $serie->type_id;
        $this->subtype = $serie->subtype_id;
        $this->subtypes = SubType::all()->where('type_id' , $this->type);

        $this->types = Type::all();
    }
    public function render()
    {
        return view('livewire.serie-type-edit');
    }
    public function updatedType(){
        $this->subtypes = SubType::all()->where('type_id' , $this->type);
    }
}
