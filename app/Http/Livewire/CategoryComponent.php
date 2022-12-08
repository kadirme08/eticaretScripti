<?php

namespace App\Http\Livewire;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Categories;
class CategoryComponent extends Component
{
    public $shorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug){
        $this->shorting="defauld";
        $this->pagesize=12;
        $this->category_slug=$category_slug;
    }

    public function store($product_id,$product_name,$product_price){




        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Products');
        session()->flash('succses','Ürün ekleme İşlemi Başarılı');
        return redirect()->route('shop.cart');
    }
    use WithPagination;
    public function render()
    {
        $category=Categories::where('slug',$this->category_slug)->first();
        $category_id=$category->id;
        $category_name=$category->name;
        $category_count=Products::where('category_id',$category_id)->get();

        if($this->shorting=='price_desc'){
            $products=Products::where('category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);

        }
        elseif($this->shorting=='price_asc'){
            $products=Products::where('category_id',$category_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);

        }
        elseif($this->shorting=='updated_at'){
            $products=Products::where('category_id',$category_id)->orderBy('updated_at','ASC')->paginate($this->pagesize);

        }
        else{
            $products=Products::paginate($this->pagesize);

        }

        $categories=Categories::all();

        return view('livewire.category-component',['products'=>$products,'categories'=>$categories,'category_name'=>$category_name,'category_count'=>$category_count]);
    }
}
