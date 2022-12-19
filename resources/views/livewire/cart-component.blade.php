<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Anasayfa</a>
                    <span></span> Ürünler
                    <span></span> Sepetim
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                <tr class="main-heading">
                                    <th scope="col">Resim</th>
                                    <th scope="col">Ürün İsmi</th>
                                    <th scope="col">Fiyat</th>
                                    <th scope="col">Adet</th>
                                    <th scope="col">Toplam</th>
                                    <th scope="col">Sil</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(Session::has('succses'))
                                    <div class="aler alert-succses"><STRONG>Başarılı!</STRONG> {{Session::get('succses')}}</div>
                                    @endif
                                @if(Cart::instance('cart')->count() > 0)
                                @foreach(Cart::instance('cart')->content() as $item)
                                <tr>
                                    <td class="image product-thumbnail"><img src="{{asset('assets/imgs/shop/product-')}}{{$item->model->id}}-1.jpg"alt="{{$item->model->name}}"></td>
                                    <td class="product-des product-name">
                                        <h5 class="product-name"><a href="#">{{$item->model->name}}</a></h5>
                                        <p class="font-xs">{{$item->model->short_description}}
                                    </td>
                                    <?php
                                         $fiyat=$item->model->regular_price;
                                         $adet=$item->qty;
                                         $toplam=$fiyat * $adet;

                                        ?>
                                    <td class="price" data-title="Price"><span>{{$item->model->regular_price}}₺</span></td>
                                    <td class="text-center" data-title="Stock">
                                        <div class="detail-qty border radius  m-auto">
                                            <a href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                            <span class="qty-val">{{$item->qty}}</span>
                                            <a href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                        </div>

                                    </td>
                                    <td class="text-right" data-title="Cart">
                                        <span>{{$toplam}}₺</span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="#" wire:click.prevent="destroy('{{$item->rowId}}')" class="text-muted"><i class="fi-rs-trash"></i></a></td>
                                </tr>
                                @endforeach


                                <tr>
                                    <td colspan="6" class="text-end">
                                        <a href="#" wire:click.prevent="destroyAll()" class="text-muted"> <i class="fi-rs-cross-small"></i> Sepetin Hepsini Temizle</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                        <div class="row mb-50">
                            <div class="col-lg-6 col-md-12">


                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="border p-md-4 p-30 border-radius cart-totals">
                                    <div class="heading_s1 mb-3">
                                        <h4>Sepet Toplamı</h4>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td class="cart_total_label">Toplam Fiyat</td>
                                                <td class="cart_total_amount"><span class="font-lg fw-900 text-brand"></span>{{Cart::subtotal()}}₺</td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">İndrim Kodu</td>
                                                <td class="cart_total_amount"> <i class="ti-gift mr-5"></i>Yok</td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">Genel Toplam</td>
                                                <td class="cart_total_amount"><strong><span class="font-xl fw-900 text-brand">{{Cart::subtotal()}}₺</span></strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a href="checkout.html" class="btn "> <i class="fi-rs-box-alt mr-10"></i> Proceed To CheckOut</a>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="container">
                                <div class="row">
                                    <span style="text-align: center;margin-bottom: 60px;margin-top:50px;font-size: 25px">Sepetinizde Ürün Bulunamadı.
                                        <i class="fa-solid fa-basket-shopping fa-lg"></i></span>

                                </div>

                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>

</div>
