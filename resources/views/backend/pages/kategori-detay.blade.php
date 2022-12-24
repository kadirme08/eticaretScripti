@extends('backend.layouts.master')
@section('title')
   Detay Urun
@endsection
@section('css')

@endsection

@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Ürünler</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-lg-12">

                        <div class="row mb-3">
                            <div class="col-xl-4 col-sm-6">
                                <div class="mt-2">
                                    <b>{{$catname->name}}</b>  <span>Kategorisindeki Ürünler</span>    <span><b>Sizin İçin </b>{{count($catCount)}} Ürün listelendi!!</span>
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-6">
                                <form class="mt-4 mt-sm-0 float-sm-right form-inline" method="post" action="{{route('searchProduct')}}">
                                    @csrf
                                    <div class="search-box mr-2">
                                        <div class="position-relative">
                                            <input type="text" class="form-control border-0" name="urun_name" placeholder="Aradıgınız Ürünü Girin">
                                            <i class="bx bx-search-alt search-icon"></i>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($catProduct as $cat)
                            <div class="col-xl-4 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="product-img position-relative">
                                            <div class="avatar-sm product-ribbon">
                                                @if(isset($cat->sale_price)!="")
                                                        <span class="avatar-title rounded-circle  bg-primary">
                                                             <?php
                                                         $fiyat=$cat->regular_price;
                                                            $fiyat2=$cat->sale_price;
                                                            $topindirim=($fiyat2*100)/$fiyat;
                                                                ?>
                                                           -{{$topindirim}}%
                                                        </span>
                                                @endif
                                            </div>
                                           <a href="{{route('updateShow',['id'=>$cat->id,'kategori_id'=>$cat->category_id])}}"><img src="{{asset("urunler/$cat->image")}}" alt="" class="img-fluid mx-auto d-block"></a>
                                        </div>
                                        <div class="mt-4 text-center">
                                            <h5 class="mb-3 text-truncate"><a href="{{route('updateShow',['id'=>$cat->id,'kategori_id'=>$cat->category_id])}}" class="text-dark">{{$cat->name}} </a></h5>

                                            <p class="text-muted">
                                                <i class="bx bx-star text-warning"></i>
                                                <i class="bx bx-star text-warning"></i>
                                                <i class="bx bx-star text-warning"></i>
                                                <i class="bx bx-star text-warning"></i>
                                                <i class="bx bx-star text-warning"></i>
                                            </p>
                                            <h5 class="my-0"><span class="text-muted mr-2"><del>{{$cat->regular_price}}</del></span> <b>{{$cat->sale_price}}</b></h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!-- end row -->


                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->



@endsection
@section('js')
@endsection
