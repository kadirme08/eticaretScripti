<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;





use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\User\UserDasboardComponent;
use App\Http\Livewire\admin\AdminDasboardComponent;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});


Route::get('/',HomeComponent::class)->name('home.index');

Route::get('/shop',ShopComponent::class)->name('shop');

Route::get('/Details/{slug}',DetailsComponent::class)->name('detail.product');

Route::get('/cart',CartComponent::class)->name('shop.cart');

Route::get('/checkout',CheckoutComponent::class)->name('shop.checkout');

Route::get('/wishlist',WishlistComponent::class)->name('shop.wishlist');


Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product-category');

Route::get('/search',SearchComponent::class)->name('product.search');

//Route::get('/dashboard', function () {
  //  return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

 Route::get('admin/index',[AdminController::class,'show'])->name('show');

Route::get('urun-listele',[ProductController::class,'showList'])->name('showList');
Route::get('urun-ekle',[ProductController::class,'productAdd'])->name('showAdd');
Route::post('urun-ekle-post',[ProductController::class,'add'])->name('add');
Route::get('urun-güncelle',[ProductController::class,'updateShow'])->name('updateShow');

Route::get('urun-durum',[ProductController::class,'changeStatus'])->name('changeStatus');

Route::get('urun-delete',[ProductController::class,'delete'])->name('delete');







require __DIR__.'/auth.php';
