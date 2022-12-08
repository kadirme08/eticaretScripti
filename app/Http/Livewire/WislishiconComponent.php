<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WislishiconComponent extends Component
{

    protected $listeners=['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.wislishicon-component');
    }
}
