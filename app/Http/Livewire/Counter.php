<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter;
    public $flag;

    public function mount(){

        $this->counter = 0;
        $this->flag = false;

    }


    public function render()
    {
        return view('livewire.counter');
    }

    public function test(){
        $this->counter++;
    }
}
