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
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="password" placeholder="Nhập tên thể loại" class="form-control" value="{{$totalGame->password}}"></div>
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

@endsection
