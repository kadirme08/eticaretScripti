<div>
    @if( count(Cart::instance('cart')->content()) >0 )
        <div class="header-action-icon-2">
            <a class="mini-cart-icon" href="{{route('shop.cart')}}">
                <img alt="Surfside Media" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}" style="margin-left: 5px">
                <span class="pro-count blue">{{Cart::instance('cart')->count()}}</span>
            </a>
            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                <ul>


                     @foreach(Cart::instance('cart')->content() as $cartitem)
                            <?php
                            $fiyat=$cartitem->model->regular_price;
                            $adet=$cartitem->qty;
                            $toplam=$fiyat * $adet;

                            ?>

                    <li>
                        <div class="shopping-cart-img">
                            <a href="{{route('detail.product',['slug'=>$cartitem->model->slug])}}"><img alt="{{substr($cartitem->model->name,0,20)}}" src="{{asset('assets/imgs/shop/product-')}}{{$cartitem->model->id}}-1.jpg"></a>
                        </div>
                        <div class="shopping-cart-title">
                            <h4><a href="{{route('detail.product',['slug'=>$cartitem->model->slug])}}">{{substr($cartitem->model->name,0,20)}}</a></h4>
                            <h4><span>{{$cartitem->qty}}× </span>{{$cartitem->model->regular_price}}₺</h4>
                        </div>
                        <div class="shopping-cart-delete">
                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                        </div>
                    </li>
                    @endforeach

                </ul>
                <div class="shopping-cart-footer">
                    <div class="shopping-cart-total">
                        <h4>Toplam <span>{{Cart::instance('cart')->subtotal()}}₺</span></h4>
                    </div>
                    <div class="shopping-cart-button">

                        <a href="checkout.html">Alışverişi Tamamla</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="header-action-icon-2">
            <a class="mini-cart-icon" href="{{route('shop.cart')}}">
                <img alt="Surfside Media" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}" style="margin-left: 5px">
                <span class="pro-count blue">0</span>
            </a>
        </div>

    @endif
</div>
