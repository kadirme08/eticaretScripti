<?php

namespace App\Http\Livewire;

use App\Models\Products;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug=$slug;
    }
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Products');
        session()->flash('succses','Ürün ekleme İşlemi Başarılı');
    }
    public function render()
    {
         $product=Products::where('slug', $this->slug)->first();
         $rproducts=Products::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();
         $nproducts=Products::latest()->take(4)->get();
         return view('livewire.details-component',['product'=>$product,'rproducts'=>$rproducts,'nproducts'=>$nproducts]);
    }
}
