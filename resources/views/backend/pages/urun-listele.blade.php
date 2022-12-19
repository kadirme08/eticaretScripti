@extends('backend.layouts.master')
@section('title')
    Ürün Listele
@endsection

@section('css')
@endsection

@section('content')
    <div class="main-content vh-100">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('showList')}}"  method="get">
                                  <div class="row mb-12">
                                    <div class="form-group row" style="margin-left: 3px">
                                        <label class="col-md-10 col-form-label">Kategoriye Göre Sırala</label>
                                        <div class="col-md-12"  style="margin-right: -25px">
                                            <select class="form-control" name="kategori_id">

                                                @foreach($kategoriler as $kategori)
                                                    @if(isset($_GET['kategori_id'])==$kategori->id)
                                                        <option value="{{$kategori->id}}" selected>{{$kategori->name}}</option>
                                                    @else

                                                        <option value="{{$kategori->id}}">{{$kategori->name}}</option>
                                                    @endif


                                                @endforeach
                                            </select>

                                        </div>
                                        <div style="position:absolute; margin-left:350px;margin-top: 40px;" >
                                        <input type="submit" class="btn btn-success" value="Filtrele">
                                        </div>



                                    </div>
                                    <div class="col-sm-8" style="margin-top: 50px">
                                        <div class="text-sm-right">
                                            <a href="{{route('showAdd')}}"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i class="mdi mdi-plus mr-1"></i> Yeni Ürün ekle</button></a>
                                        </div>
                                    </div><!-- end col-->
                                </div>
                                </form>


                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap">
                                        <thead class="thead-light">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>#</th>
                                            <th>Ürün Resmi</th>
                                            <th>Ürün adı</th>
                                            <th>Urun Durumu</th>
                                            <th>Eklenme Tarihi</th>
                                            <th>İşlemler</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(Count($urunler)>0)
                                       @foreach($urunler as $urun)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td><a href="javascript: void(0);" class="text-body font-weight-bold">{{$urun->id}}</a> </td>
                                            <td><img src="{{asset('assets/imgs/shop/product-')}}{{$urun->id}}-2.jpg" alt="{{$urun->name}}" width="70px" height="70px"> </td>
                                            <td>
                                                {{$urun->name}}
                                            </td>
                                            <td>
                                                @if($urun->status==1)
                                                    <a href="{{route('changeStatus',['id'=>$urun->id,'status'=>$urun->status])}}">  <span class="badge badge-pill badge-soft-success font-size-12">Aktif</span></a>
                                                @endif
                                                @if($urun->status==0)
                                                        <a href="{{route('changeStatus',['id'=>$urun->id,'status'=>$urun->status])}}"> <span class="badge badge-pill badge-soft-danger font-size-12">pasif</span></a>
                                                 @endif
                                            </td>
                                            <td>
                                                {{$urun->created_at}}
                                            </td>
                                            <td>
                                                <a href="{{route('updateShow',['id'=>$urun->id,'kategori_id'=>$urun->category_id])}}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Düzenle"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                <a href="{{route('delete',['id'=>$urun->id])}}" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sil"><i class="mdi mdi-close font-size-18"></i></a>
                                            </td>

                                        </tr>
                                       @endforeach
                                        @else
                                        <tr>
                                            <td colspan="7" style="text-align: center">Listelenicek Ürün Bulunamadı Lütfen ategori secin..</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <ul class="pagination pagination-rounded justify-content-end mb-2">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                            <i class="mdi mdi-chevron-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                            <i class="mdi mdi-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>

    </div>

@endsection

@section('js')
@endsection

