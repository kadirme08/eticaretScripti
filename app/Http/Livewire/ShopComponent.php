<?php

namespace App\Http\Livewire;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Categories;
class ShopComponent extends Component
{
     public $shorting;
     public $pagesize;

     public function mount(){
         $this->shorting="defauld";
         $this->pagesize=12;

     }
     public function addToWishList($product_id,$product_name,$product_price){
         Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Products');
         $this->emitTo('wislishicon-component','refreshComponent');
     }


     public function store($product_id,$product_name,$product_price){
         Cart::instace('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Products');
         session()->flash('succses','Ürün ekleme İşlemi Başarılı');
         $this->emitTo('cart-icon-component','refreshComponent');

         return redirect()->route('shop.cart');
     }
      public function removeWhistList($product_id){
          foreach (Cart::instance('wishlist')->content() as $witem) {
              if($witem->id==$product_id){
                  Cart::instance('wishlist')->remove($witem->rowId);
                  $this->emitTo('wislishicon-component','refreshComponent');

                  return;

              }

          }
      }

     use WithPagination;
    public function render()
    {
         if($this->shorting=='price_desc'){
             $products=Products::orderBy('regular_price','DESC')->paginate($this->pagesize);
         }
         elseif($this->shorting=='price_asc'){
             $products=Products::orderBy('regular_price','ASC')->paginate($this->pagesize);

         }
         elseif($this->shorting=='updated_at'){
             $products=Products::orderBy('updated_at','ASC')->paginate($this->pagesize);

         }
         else{
             $products=Products::paginate($this->pagesize);

         }

         $categories=Categories::all();

        return view('livewire.shop-component',['products'=>$products,'categories'=>$categories]);
    }
}
