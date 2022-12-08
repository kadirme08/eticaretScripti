<div class="header-action-icon-2">
    <a href="{{route('shop.wishlist')}}">

        <img class="svgInject" alt="Favoriler" src="{{asset('assets/imgs/theme/icons/icon-heart.svg')}}" style="margin-left: 5px">
        @if(Cart::instance('wishlist')->count()>0)
        <span class="pro-count blue">{{Cart::instance('wishlist')->count()}}</span>
        @endif
    </a>
</div>
