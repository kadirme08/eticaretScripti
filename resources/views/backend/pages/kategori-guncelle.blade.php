@extends('backend.layouts.master')
@section('title')
    Kategori Listele
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
                            <h4 class="mb-0 font-size-18">Category Update</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="post">
                                    @csrf
                                    <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Kategori Adı</label>
                                                    <input  name="cat_adi" type="text" class="form-control" value="{{$catUpdate->name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label >Kategori Link</label>
                                                    <input name="cat_link" type="text" class="form-control" value="{{$catUpdate->slug}}">
                                                </div>
                                                <div class="form-group">
                                                    <label >Kategori Başlık</label>
                                                    <input name="cat_baslik" type="text" class="form-control" value="{{$catUpdate->kategori_title}}">
                                                </div>
                                                <div class="form-group">
                                                    <label >Kategori Kısa Açıklama</label>
                                                    <input name="cat_kisaAciklama" type="text" class="form-control" value="{{$catUpdate->kisaAciklama}}">
                                                </div>
                                                <div class="form-group">
                                                    <label >Kategori Açıklama</label>
                                                    <input name="cat_aciklama" type="text" class="form-control" value="{{$catUpdate->description}}">
                                                </div>
                                                <div class="form-group">
                                                    <label >Kategori keyword</label>
                                                    <input name="cat_keyword" type="text" class="form-control" value="{{$catUpdate->keyword}}">
                                                </div>
                                            </div>


                                    </div>

                                    <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Değişiklikleri Kaydet</button>

                                </form>

                            </div>
                        </div>



                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


@endsection

@section('js')
@endsection
