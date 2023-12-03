<?php

namespace App\Http\Livewire;

use App\Models\SubType;
use App\Models\Type;
use Livewire\Component;

class TvTypeEdit extends Component
{
    public $Tv;
    public $type;
    public $subtype;
    public $subtypes;

    public $types;

    public function mount($Tv){

        $this->Tv = $Tv;
        $this->type = $this->Tv->type_id;
        $this->subtype = $this->Tv->subtype_id;
        $this->types = Type::all();
        $this->subtypes = SubType::all()->where('type_id' , $this->type);




    }
    public function render()
    {
        return view('livewire.tv-type-edit');
    }

    public function updatedType(){
        $this->subtypes = SubType::all()->where('type_id' , $this->type);

    }

}
