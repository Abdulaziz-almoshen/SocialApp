<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Example extends Component
{

   public $name = 'hello wrold';
    public function render()
    {
        return view('livewire.example');
    }
}
