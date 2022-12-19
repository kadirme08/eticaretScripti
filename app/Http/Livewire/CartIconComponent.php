<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Cart;
use Livewire\Component;

class CartIconComponent extends Component
{
    protected $listeners=['refreshComponent'=>'$refresh'];
     public function sil($rowId){
         Cart::instance('cart')->remove($rowId);

         $this->emitTo('cart-icon-component','refreshComponent');

     }

    public function render()
    {
        return view('livewire.cart-icon-component');
    }
}
