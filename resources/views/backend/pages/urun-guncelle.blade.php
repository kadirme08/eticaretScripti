@extends('backend.layouts.master')
@section('title')
   Urun Güncelle
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    @include('backend.layouts.sidebar')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Ürün ekle</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-body">
                                <form action="{{route('update')}}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="{{$urunUpdate->id}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Kategoriler</label>
                                                <select class="form-control select2" name="kategori_id">
                                                    @foreach($catlist as $cat)
                                                        <option value="{{$cat->id}}" @if($_GET['kategori_id']==$cat->id) selected @endif >{{$cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Ürün Adı</label>
                                                <input name="urun_adi" type="text" class="form-control" value="{{$urunUpdate->name}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Slug</label>
                                                <input name="urun_slug" type="text" class="form-control" value="{{$urunUpdate->slug}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Fiyat</label>
                                                <input name="urun_fiyat" type="text" class="form-control" value="{{$urunUpdate->regular_price}}">
                                            </div>
                                            <div class="form-group">
                                                <label>İndirim Fiyatı</label>
                                                <input name="fiyat_indirim" placeholder="İndirim Yoksa Boş geçilebilir" value="{{$urunUpdate->sale_price}}"
                                                       type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>SKU</label>
                                                <input name="urun_sku" type="text" value="{{$urunUpdate->SKU}}"
                                                       placeholder="Ürün Barkodu..Yoksa Boş geçilebilir"
                                                       class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Stok</label>
                                                <select class="form-control" name="stok_durumu">
                                                    @if($urunUpdate->stock_status=='instock')
                                                    <option value="instock">Stok var</option>
                                                    @endif
                                                    @if($urunUpdate->stock_status=='outofstock')
                                                    <option value="outofstock">Stok Yok</option>
                                                     @endif
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Ürün Adet</label>
                                                <input name="urun_adet" type="text" class="form-control" value="{{$urunUpdate->quantity}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group">

                                                @if($urunUpdate->numaralar)
                                                    <label style="margin-left: 75px">Numaralar</label>
                                                    <label style="margin-left: 105px">ADET</label><br>
                                                @foreach($n as $key=>$value)
                                                    <label>{{$key+1}}.numara</label>
                                                <input name="numara[]" type="text" value="{{$value['numara']}}">
                                                <input name="adet[]" type="text" value="{{$value['adet']}}"><br>
                                                @endforeach
                                                @else
                                                    <label style="margin-left: 75px">Numaralar</label>
                                                    <label style="margin-left: 105px">ADET</label><br>
                                                <label>1.numara</label>
                                                    <input name="numara[]" type="text">
                                                    <input name="adet[]" type="text"><br>
                                                    <label>2.numara</label>
                                                    <input name="numara[]" type="text">
                                                    <input name="adet[]" type="text"><br>
                                                    <label>3.numara</label>
                                                    <input name="numara[]" type="text">
                                                    <input name="adet[]" type="text"><br>
                                                    <label>4.numara</label>
                                                    <input name="numara[]" type="text">
                                                    <input name="adet[]" type="text"><br>
                                                    <label>5.numara</label>
                                                    <input name="numara[]" type="text">
                                                    <input name="adet[]" type="text"><br>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Ürün Durumu</label>
                                                <select class="form-control" name="urun_durum">

                                                        <option value="Popularurun" >Popular Ürün</option>
                                                        <option value="Yeniurun" >Yeni Ürün</option>
                                                        <option value="Anasayfa" >Urun Anasayfa Göster</option>

                                                    @if($urunUpdate->urun_durum=='Popularurun')
                                                    <option value="Popularurun" selected>Popular Ürün</option>
                                                    <option value="Yeniurun" >Yeni Ürün</option>
                                                    <option value="Anasayfa" >Urun Anasayfa Göster</option>
                                                    @endif
                                                    @if($urunUpdate->urun_durum=='Yeniurun')
                                                            <option value="Popularurun" >Popular Ürün</option>
                                                            <option value="Yeniurun" selected>Yeni Ürün</option>
                                                            <option value="Anasayfa" >Urun Anasayfa Göster</option>
                                                    @endif
                                                    @if($urunUpdate->urun_durum=='anasayfa')

                                                            <option value="Popularurun" >Popular Ürün</option>
                                                            <option value="Yeniurun" >Yeni Ürün</option>
                                                            <option value="Anasayfa"selected >Urun Anasayfa Göster</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Ürün Kısa Açıklama</label>
                                                <textarea id="editor" class="form-control" name="urun_kisaciklama"
                                                          rows="3">{{$urunUpdate->short_description}}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Ürün Açıklama</label>
                                                <textarea id="editor1" class="form-control" name="urun_aciklma"
                                                          rows="8">{{$urunUpdate->description}}</textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card">
                                        @if($urunUpdate->image)
                                      <div style="width: 250px;height: 250px;">
                                        <img src="{{asset("urunler/$urunUpdate->image")}}"  width=100%; height="100%"; style=" border-radius: 25px">
                                      </div>
                                        @endif
                                        <div class="card-body">
                                            <h4 class="card-title mb-3">Ürün Resim</h4>
                                            <div class="fallback">
                                                <input name="urun_resim" type="file"/>
                                            </div>
                                        </div>

                                        <div class="card">
                                            @if($urunUpdate->images)
                                                <div class="container">
                                                    <div class="row">
                                                @foreach($i as $key=>$value)
                                                <div class="col-md-2" style="width: 350px;height: 150px;">
                                                    <img src="{{asset("urunler/$value")}}" width=100%; height="100%"; style="  border-radius:15px;  margin-top: 15px ">
                                                </div>
                                                @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="card-body">
                                                <h4 class="card-title mb-3">Çoklu Resim</h4>
                                                <div class="fallback">
                                                    <input name="coklu_resim[]" type="file" multiple/>
                                                </div>

                                            </div>

                                            <!--   <div class="card">
                                                   <div class="card-body">

                                                       <h4 class="card-title">Meta Data</h4>
                                                       <p class="card-title-desc">Fill all information below</p>

                                                       <form>
                                                           <div class="row">
                                                               <div class="col-sm-6">
                                                                   <div class="form-group">
                                                                       <label for="metatitle">Meta title</label>
                                                                       <input id="metatitle" name="productname" type="text" class="form-control">
                                                                   </div>
                                                                   <div class="form-group">
                                                                       <label for="metakeywords">Meta Keywords</label>
                                                                       <input id="metakeywords" name="manufacturername" type="text" class="form-control">
                                                                   </div>
                                                               </div>

                                                               <div class="col-sm-6">
                                                                   <div class="form-group">
                                                                       <label for="metadescription">Meta Description</label>
                                                                       <textarea class="form-control" id="metadescription" rows="5"></textarea>
                                                                   </div>
                                                               </div>
                                                           </div>

                                                           <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Changes</button>
                                                           <button type="submit" class="btn btn-secondary waves-effect">Cancel</button>

                                                       </form>

                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                        end row -->

                                        </div>


                                    </div>
                                    <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Kayıt
                                        Et
                                    </button>

                                </form>
                            </div>


                        </div>



                    </div>


                    @endsection

                    @section('js')
                        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

                        <script>  $(document).ready(function () {
                                $('#editor').summernote();
                            });
                        </script>
                        <script>  $(document).ready(function () {
                                $('#editor1').summernote();
                            });
                        </script>
@endsection
