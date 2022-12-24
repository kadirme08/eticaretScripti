@extends('backend.layouts.master')
@section('title')
    Kategori Listele
@endsection

@section('css')
@endsection

@section('content')
    <div class="main-content ">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('showList')}}"  method="get">
                                    <div class="row mb-12">
                                        <div class="col-sm-12">
                                            <div class="text-sm-right">
                                                <a href="{{route('addShowCategory')}}"><button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" ><i class="mdi mdi-plus mr-1"></i> Yeni Kategori ekle</button></a>
                                            </div>
                                        </div><!-- end col-->
                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>Kategori Adı</th>
                                            <th>Kategori Durumu</th>
                                            <th>Kategori Detay</th>
                                            <th>İşlemler</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($categories))
                                        @foreach($categories as $cat)
                                                <tr>

                                                    <td>
                                                        {{$cat->name}}
                                                    </td>

                                                    <td>
                                                        @if($cat->kategori_durum==1)
                                                         <a href="{{route('changeStatusCategory',['id'=>$cat->id,'status'=>$cat->kategori_durum])}}">  <span class="badge badge-pill badge-soft-success font-size-12">Aktif</span>   </a>
                                                        @endif
                                                            @if($cat->kategori_durum==0)
                                                                <a href="{{route('changeStatusCategory',['id'=>$cat->id,'status'=>$cat->kategori_durum])}}">  <span class="badge badge-pill badge-soft-danger font-size-12">Pasif</span>   </a>
                                                            @endif
                                                    </td>
                                                    <td>

                                                        <a href="{{route('showCategoryProduct',['catid'=>$cat->id])}}">
                                                        <button type="button" class="btn btn-primary btn-sm btn-rounded">
                                                          Kategorideki Ürünlere Git
                                                        </button>
                                                        </a>


                                                    <td>
                                                        <a href="{{route('updateCategory',['id'=>$cat->id])}}" class="mr-3 text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Düzenle"><i class="mdi mdi-pencil font-size-18"></i></a>
                                                        <a href="{{route('deleteCategory',['id'=>$cat->id])}}" class="text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sil"><i class="mdi mdi-close font-size-18"></i></a>
                                                    </td>

                                                </tr>
                                        @endforeach

                                            @else
                                            <tr>
                                                <td colspan="7" style="text-align: center">Listelenicek Ürün Bulunamadı Lütfen ategori secin..</td>
                                            </tr>
                                        @endif


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

