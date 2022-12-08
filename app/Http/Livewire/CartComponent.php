<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartComponent extends Component
{

     public function increaseQuantity($rowId){
         $product=Cart::instace('cart')->get($rowId);
         $qty=$product->qty + 1;
         Cart::instace('cart')->update($rowId ,$qty);
         $this->emitTo('cart-icon-component','refreshComponent');
     }

    public function decreaseQuantity($rowId){
        $product=Cart::instace('cart')->get($rowId);
        $qty=$product->qty - 1;
        Cart::instace('cart')->update($rowId ,$qty);
        $this->emitTo('cart-icon-component','refreshComponent');

    }

     public function destroy($rowId){

         Cart::instace('cart')->remove($rowId);
         $this->emitTo('cart-icon-component','refreshComponent');

         Session()->flash('succses','Ürün Silme İşlemi Başarılı');
     }
     public function destroyAll(){

         Cart::instace('cart')->destroy();
         $this->emitTo('cart-icon-component','refreshComponent');

         Session()->flash('succses','Ürün Sİlme İşlemi Başarılı');
     }
    public function render()
    {
        return view('livewire.cart-component');
    }
}
