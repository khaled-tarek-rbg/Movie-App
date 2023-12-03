<?php

namespace App\Http\Livewire;

use App\Models\SubType;
use App\Models\Type;
use Livewire\Component;



class SerieInput extends Component
{

    public $types ;
    public $selectedType = '';
    public $selectedSubType = '';

    public $subTypes = '';


    public function mount(){
        $this->types = Type::all();
        if($this->selectedType == ''){
            $this->subTypes = [];
        }else{
            $this->subTypes = SubType::all()->where('type_id' , $this->selectedType);
        }
    }


    public function render()
    {
        return view('livewire.serie-input');
    }

    public function updatedSelectedType(){
        // dd('hhfhf');
        if($this->selectedType == ''){
            $this->subTypes = [];
        }else{
            $this->subTypes = SubType::all()->where('type_id' , $this->selectedType);
        }
    }

}
