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
                            <li><a href="#">UI Elements</a></li>
                            <li class="active">Cards</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-2">Thông tin</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img width="167px" height="158px" class="rounded-circle mx-auto d-block" src="{{asset('public/upload/'.Auth::user()->hinhanh)}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{Auth::user()->name}}</h5>
                                    <div class="location text-sm-center"><i class="fa fa-google-plus" style="color: red;"></i> {{Auth::user()->email}}</div>
                                    <div class="location text-sm-center"><i class="fa fa-star" style="color: red;"></i> Admin</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                    <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                    <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                    <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
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
                                <strong>Sửa thông tin User</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{asset('admin/users/sua/'.$users->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên User</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="Name" placeholder="Nhập tên User" class="form-control" value="{{$users->name}}"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
                                        <div class="col-12 col-md-9"><input type="email" id="email-input" name="Email" placeholder="Nhập email" class="form-control" value="{{$users->email}}" readonly=""></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Đổi password</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <label for="checkbox1" class="form-check-label ">
                                                        <input type="checkbox" id="checkbox1" name="changePassword" value="option1" class="form-check-input">Đổi passwrod
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Password mới</label></div>
                                        <div class="col-12 col-md-9"><input type="password" id="Pass" name="Password" placeholder="Nhập password" class="form-control" disabled=""></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nhập lại Password</label></div>
                                        <div class="col-12 col-md-9"><input type="password" id="changePass" name="PasswordAgain" placeholder="Nhập password" class="form-control" disabled=""></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Quyền</label></div>
                                        <div class="col col-md-9">
                                            <div class="form-check">
                                                <div class="radio">
                                                    <label for="radio1" class="form-check-label ">
                                                        <input type="radio" id="radio1" name="Level" value="1" class="form-check-input" @if ($users->level == 1)
                                                            checked="" 
                                                        @endif>Admin
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label for="radio2" class="form-check-label ">
                                                        <input type="radio" id="radio2" name="Level" value="0" class="form-check-input" @if ($users->level == 0)
                                                            checked="" 
                                                        @endif>Khác
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Avatar</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="HinhAnh" class="form-control-file">
                                            <br>
                                            <img width="200px" height="130px" src="{{asset('public/upload/'.$users->hinhanh)}}">
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

                </div><!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->

@endsection