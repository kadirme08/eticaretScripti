<?php

namespace App\Http\Livewire;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Categories;
class SearchComponent extends Component
{
    public $shorting;
    public $pagesize;

    public $q;
    public $search_term;

    public function mount(){
        $this->shorting="defauld";
        $this->pagesize=12;
        $this->fill(request()->only('q'));
        $this->search_term='%'.$this->q.'%';


    }


    public function store($product_id,$product_name,$product_price){
        Cart::instace('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Products');
        session()->flash('succses','Ürün ekleme İşlemi Başarılı');
        $this->emitTo('cart-icon-component','refreshComponent');

        return redirect()->route('shop.cart');
    }
    use WithPagination;
    public function render()
    {
        if($this->search_term!==""){

            $products=Products::where('name','like',$this->search_term)->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }else{

            $products=Products::paginate($this->pagesize);

        }

        $categories=Categories::all();

        return view('livewire.search-component',['products'=>$products,'categories'=>$categories]);
    }
}
