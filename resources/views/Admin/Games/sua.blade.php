@extends('Admin.Layout.master')
@section('content')
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-8">
                        @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>  
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <strong>Sửa Games</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{asset('admin/games/sua/'.$games->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="select" class=" form-control-label">Tag thể loại</label></div>
                                        <div class="col-12 col-md-9">
                                            @foreach ($games->games_tag as $items)
                                                <a href="{{asset('admin/ajax/deletetag/'.$items->tag_theloai->id)}}"><button type="button" class="btn btn-outline-success">{{$items->tag_theloai->Name}}</button></a>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên Games</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Name" placeholder="Nhập tên games" class="form-control" value="{{$games->Name}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Thể loại</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="TheLoai" placeholder="Nhập tên thể loại" class="form-control" value="{{$games->TheLoai}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kích thước</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="KichThuoc" placeholder="Nhập kích thước file games" class="form-control" value="{{$games->KichThuoc}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số Part</label></div>
                                        <div class="col-12 col-md-9"><input type="number" id="text-input" name="SoPart" placeholder="Nhập số part games" class="form-control" value="{{$games->SoPart}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Series</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Series" placeholder="Nhập Series games" class="form-control" value="{{$games->Series}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Email" placeholder="Nhập Email" class="form-control" value="{{$games->Email}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mô tả</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="MoTa" placeholder="Nhập mô tả" class="form-control" value="{{$games->MoTa}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Avatar</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Avatar" placeholder="url Avatar" class="form-control" value="{{$games->Avatar}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh chính</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhChinh" placeholder="url ảnh chính" class="form-control" value="{{$games->AnhChinh}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh phụ 1</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhPhu1" placeholder="url ảnh phụ 1" class="form-control" value="{{$games->AnhPhu1}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh phụ 2</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhPhu2" placeholder="url ảnh phụ 2" class="form-control" value="{{$games->AnhPhu2}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh phụ 3</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhPhu3" placeholder="url ảnh phụ 3" class="form-control" value="{{$games->AnhPhu3}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh phụ 4</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhPhu4" placeholder="url ảnh phụ 4" class="form-control" value="{{$games->AnhPhu4}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ảnh Mini</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="AnhMini" placeholder="url ảnh Mini" class="form-control" value="{{$games->AnhMini}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Cập nhật</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="radio">
                                                    <label for="radio1" class="form-check-label ">
                                                        <input type="radio" id="radio1" name="CapNhat" value="Co" class="form-check-input">Có
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio2" class="form-check-label ">
                                                        <input type="radio" id="radio2" name="CapNhat" value="Khong" class="form-check-input" checked="">Không
                                                    </label>
                                                </div>                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Giới thiệu</label></div>
                                        <div class="col-12 col-md-9"><textarea name="GioiThieu" id="textarea-input demo" rows="9" placeholder="Content..." class="form-control ckeditor">{{$games->GioiThieu}}</textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nội dung</label></div>
                                        <div class="col-12 col-md-9"><textarea name="NoiDung" id="textarea-input demo" rows="9" placeholder="Content..." class="form-control ckeditor">{{$games->NoiDung}}</textarea></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Link Games</label></div>
                                        <div class="col-12 col-md-9"><textarea name="LinkGame" id="textarea-input demo" rows="9" placeholder="Content..." class="form-control ckeditor">{{$games->LinkGame}}</textarea></div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Sửa
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </form>
                            </div>                           
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>Sửa Tag</strong>
                            </div>
                            <div class="card-body card-block">
                                <a href="{{asset('admin/tag/edittag/'.$games->id)}}"><button type="button" class="btn btn-primary">Sửa tag</button></a>
                            </div>                           
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

@endsection
@section('script')
    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('#select').change(function(event) {
        //         var idTheLoai = $(this).val();
        //         $.get('admin/ajax/theloai/'+idTheLoai, function(data) {
        //             $('#test').html(data);
        //         });
        //     });
        //     $('#test').click(function(event) {
        //         var TenSession = $(this).text();
        //         $.get('admin/ajax/xoasession/'+TenSession, function(data) {
        //             $('#test').text(data);
        //         });
        //     });
        // });
    </script>
@endsection
