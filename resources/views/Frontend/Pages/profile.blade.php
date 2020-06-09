@extends('Frontend.Layout.master')
@section('content')
<h3>HỒ SƠ CÁ NHÂN</h3>
    <div class="container gg">
        <div class="row" style="margin-left: 0px;">
            <div class="col-lg-4" style="margin-bottom:58px;background:#171e22;">
                <div class="col-lg-8 ba" style="margin:auto;text-align: center;">
                    <div class="">
                        <p>Ngày gia nhập</p>
                        <p>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Auth::user()->created_at)->format('d-m-Y') }}</p>
                    </div>
                    <div>
                        <img src="assets/images/user.png" alt="">
                    </div>
                    <div class="">
                        <h4>{{\Auth::user()->name}}</h4>
                    </div>
                    <div class="">
                        <h5>Chức vụ: Member</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                {{-- <div class="row">
                    <div class="col-12">
                        <h5>Thông tin tài khoản</h5>
                    </div>
                    
                </div> --}}
                {{-- <div class="row ay">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                Họ tên :
                            </div>
                            <div class="col-6">
                                {{\Auth::user()->name}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                Email :
                            </div>
                            <div class="col-6">
                                {{\Auth::user()->email}}
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    {{-- <h5>Thông tin tài khoản</h5> --}}
                    {{-- <div class="nk-gap"></div> --}}
                    <div class="nk-tabs">
                        <ul class="nav nav-tabs kk" role="tablist">
                            <li class="nav-item">
                                <a class=" active" href="#tabs-1-1" role="tab" data-toggle="tab" aria-selected="true">Thông tin tài khoản</a>
                            </li>
                            <li class="nav-item">
                                <a class="" href="#tabs-1-2" role="tab" data-toggle="tab" aria-selected="false">Sửa thông tin</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link active" href="#tabs-1-3" role="tab" data-toggle="tab" aria-selected="true">Tab 3</a>
                            </li> --}}
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active show" id="tabs-1-1">
                          
                                    <div class="row ay">
                                        <div class="col-12">
                                            <div class="row mt-4">
                                                <div class="col-3">
                                                   <strong> Họ tên:</strong>
                                                </div>
                                                <div class="col-6">
                                                    {{\Auth::user()->name}}
                                                </div>
                                            </div>
                                            <div class="row mt-4 df">
                                                <div class="col-3">
                                                    <strong>Email:</strong>
                                                </div>
                                                <div class="col-6">
                                                    {{\Auth::user()->email}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                 
                            </div>
                            <div role="tabpanel" class="tab-pane fade " id="tabs-1-2">
                            
                                <div class="row ay">
                    
                                    <div class="col-12">
                                    @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                    <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="password" class="form-control name" id="recipient-name" name="current-password" placeholder="Nhập mật khẩu cũ"> 
                                            @if ($errors->has('current-password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('current-password') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control name" id="recipient-name" name="new-password" placeholder="Nhập mật mới">
                                            @if ($errors->has('new-password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('new-password') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control name " id="recipient-name" name="new-password_confirmation" placeholder="Nhập lại mật khẩu mới">
                                        </div>
                                        <div class="form-group" style="text-align: center;">
                                            <button type="submit" class="nk-btn nk-btn-outline nk-btn-color-success ">Đổi mật khẩu</button>
                                        </div>
                                        </form>
                                    </div>
                                    
                            
                        </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <hr/> --}}
        {{-- <div class="row">
            <div class="col-lg-4">
               
            </div>
            
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <h5>Đổi thông tin tài khoản</h5>
                    </div>
                    
                </div>
                <div class="row ay">
                    
                            <div class="col-12">
                            @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                            <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="password" class="form-control name" id="recipient-name" name="current-password" placeholder="Nhập mật khẩu cũ"> 
                                    @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control name" id="recipient-name" name="new-password" placeholder="Nhập mật mới">
                                    @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control name " id="recipient-name" name="new-password_confirmation" placeholder="Nhập lại mật khẩu mới">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="nk-btn nk-btn-outline nk-btn-color-success ">Đổi mật khẩu</button>
                                </div>
                                </form>
                            </div>
                            
                    
                </div>
            </div>
        </div> --}}
    </div>
    @if(!\Auth::user())
        <script>
            window.location.href = '/'
        </script>
    @endif
    <style>
        body, h3{
            color:white;
            
        }
    
        h3{
            margin-top:50px;
            text-align: center;
        }
        .ay, .gg{
            margin-top:30px;
        }
        hr{
            color:white;
            border: 1px solid white;
        }
        .kk a{
            color: white;
            text-transform: uppercase;
            margin-right: 10px;
        }
        .kk a:hover{
            text-decoration: none;
            border-bottom: 2px solid red; 
        }
        .nav-item .active{
            border-bottom: 2px solid red; 
        }
        .ba p{
            margin-top: 30px;
        }
        .ba img{
            width: 150px;
            margin-bottom: 25px;
        }
    </style>
@endsection
