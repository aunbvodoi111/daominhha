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
                                <strong>Sửa số game được cho phép tải tối đa trong một ngày</strong>
                                <p>Số game đang cho download một ngày là: {{$totalGame->sogame}}</p>
                            </div>
                            
                            <div class="card-body card-block">
                                <form action="{{asset('admin/tonghop/sua/'.$totalGame->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số game tải mỗi ngày</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="sogame" placeholder="Nhập tên thể loại" class="form-control" value="{{$totalGame->sogame}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password truy cập link rút gọn</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="password" placeholder="Nhập tên thể loại" class="form-control"  value="{{$totalGame->password}}">
                                            
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bật tắt login</label></div>
                                        <div class="col-12 col-md-9">
                                            <img src="images/sw.png" class="sw all{{$totalGame->id}}" attr_id="{{$totalGame->id}}" attr_type="1" @if($totalGame->close_login == 0) style="display:none;" @endif>
                                            <img src="images/sww.png" class="sww al{{$totalGame->id}}" attr_id="{{$totalGame->id}}" attr_type="1" @if($totalGame->close_login == 1) style="display:none;" @endif></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Bật tắt đăng kí</label></div>
                                        <div class="col-12 col-md-9">
                                            <img src="images/sw.png" class="swt allt{{$totalGame->id}}" attr_id="{{$totalGame->id}}" attr_type="1" @if($totalGame->colse_register == 0) style="display:none;" @endif>
                                            <img src="images/sww.png" class="swwt alt{{$totalGame->id}}" attr_id="{{$totalGame->id}}" attr_type="1" @if($totalGame->colse_register == 1) style="display:none;" @endif></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số ip một user đăng nhập</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="ip_check" placeholder="Nhập tên thể loại" class="form-control" value="{{$totalGame->ip_check}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Quyền copy</label></div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="copy">
                                                <option value="3">ADMIN</option>
                                                <option value="0">MEMBER</option>
                                                <option value="-1">TẤT CẢ</option>
                                            </select>
                                        </div>
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

                </div>


            </div><!-- .animated -->
        </div><!-- .content -->
        <style>
            img{
                width: 100px;
            }
        </style>
@endsection
@section('script')
  
  <script type="text/javascript">
      $(document).on('click', '.sw', function() {
            var id = $(this).attr('attr_id');
            var type = $(this).attr('attr_type');
            $('.all'+id).hide();
            $('.al'+id).show();
            link(id,type)
        });
        $(document).on('click', '.sww', function() {
            var id = $(this).attr('attr_id');
            var type = $(this).attr('attr_type');
            $('.al'+id).hide();
            $('.all'+id).show();
            link(id,type)
        });
        $(document).on('click', '.swt', function() { 
            var id = $(this).attr('attr_id');
            var type = $(this).attr('attr_type');
            $('.allt'+id).hide();
            $('.alt'+id).show();
            linkRe(id,type)
        });
        $(document).on('click', '.swwt', function() { 
            var id = $(this).attr('attr_id');
            var type = $(this).attr('attr_type');
            $('.alt'+id).hide();
            $('.allt'+id).show();
            linkRe(id,type)
        });
    function link(id,type){
        var token =$("input[name='_token']").val(); 
        $.ajax({
            url:'/admin/tonghop/on_off_login',
            type:'post',
            dataType: 'json',
            data:{"_token":token},
        }).done(function(json) {
            
        })
    }

    function linkRe(id,type){
        var token =$("input[name='_token']").val(); 
        $.ajax({
            url:'/admin/tonghop/on_off_regis',
            type:'post',
            dataType: 'json',
            data:{"_token":token},
        }).done(function(json) {
            
        })
    }
    function xoa(){
      var test = confirm('Bạn có chắc chắn muốn xóa');
      if(test){
        return true;
      }
      else{
        return false;
      }
    }
  </script>
@endsection