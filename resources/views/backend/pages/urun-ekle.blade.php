@extends('backend.layouts.master')
@section('title')
    urun ekle
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
                                <form action="{{route('add')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Kategoriler</label>
                                                <select class="form-control select2" name="kategori_id">

                                                    @foreach($category as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Ürün Adı</label>
                                                <input name="urun_adi" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Slug</label>
                                                <input name="urun_slug" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Fiyat</label>
                                                <input name="urun_fiyat" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>İndirim Fiyatı</label>
                                                <input name="fiyat_indirim" placeholder="İndirim Yoksa Boş geçilebilir"
                                                       type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>SKU</label>
                                                <input name="urun_sku" type="text"
                                                       placeholder="Ürün Barkodu..Yoksa Boş geçilebilir"
                                                       class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Stok</label>
                                                <select class="form-control" name="stok_durumu">
                                                    <option value="instock">Stok var</option>
                                                    <option value="outofstock">Stok Yok</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Ürün Adet</label>
                                                <input name="urun_adet" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label style="margin-left: 75px">Numaralar</label>
                                                <label style="margin-left: 105px">ADET</label><br>
                                                <label>1.numara</label>

                                                <input name="numara[]" type="text" >
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


                                            </div>

                                            <div class="form-group">
                                                <label class="control-label">Ürün Durumu</label>
                                                <select class="form-control" name="urun_durum">
                                                    <option selected>Seçin..</option>
                                                    <option value="Popularurun">Popular Ürün</option>
                                                    <option value="Yeniurun">Yeni Ürün</option>
                                                    <option value="Anasayfa">Urun Anasayfa Göster</option>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Ürün Kısa Açıklama</label>
                                                <textarea id="editor" class="form-control" name="urun_kisaciklama"
                                                          rows="3"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Ürün Açıklama</label>
                                                <textarea id="editor1" class="form-control" name="urun_aciklma"
                                                          rows="8"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title mb-3">Ürün Resim</h4>
                                            <div class="fallback">
                                                <input name="urun_resim" type="file"/>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title mb-3">Çoklu Resim</h4>
                                                <div class="fallback">
                                                    <input name="coklu_resim[]" type="file" multiple/>
                                                </div>

                                            </div> <!-- end card-->

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

                            <!-- container-fluid -->
                        </div>
                        <!-- End Page-content -->


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
