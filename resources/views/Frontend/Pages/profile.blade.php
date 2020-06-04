@extends('Frontend.Layout.master')
@section('content')
<h3>HỒ SƠ CÁ NHÂN</h3>
    <div class="container gg">
        <div class="row">
            <div class="col-lg-4">
                <div class="col-lg-8" style="margin:auto;">
                    <div class="">
                        <p>Ngày gia nhập</p>
                        <p>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', Auth::user()->created_at)->format('d-m-Y') }}</p>
                    </div>
                    <div class="">
                        <h4>{{\Auth::user()->name}}</h4>
                    </div>
                    <div class="">
                        <h5>Member</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <h5>Thông tin tài khoản</h5>
                    </div>
                    
                </div>
                <div class="row ay">
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
                    <!-- <div class="col-2">
                        Sửa đổi thông tin
                    </div>
                    <div class="col-2">
                        Đã từng ủng hộ
                    </div> -->
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
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

                                    <input type="password" class="form-control name" id="recipient-name" name="new-password_confirmation" placeholder="Nhập lại mật khẩu mới">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Đổi mật khẩu</button>
                                </div>
                                </form>
                            </div>
                        <!-- <div class="col-2">
                            Sửa đổi thông tin
                        </div>
                        <div class="col-2">
                            Đã từng ủng hộ
                        </div> -->
                    
                </div>
            </div>
        </div>
    </div>
    @if(!\Auth::user())
        <script>
            window.location.href = '/'
        </script>
    @endif
    <style>
        body, h3{
            color:white;
            text-align:center;
            
        }
        h3{
            margin-top:50px;
        }
        .ay, .gg{
            margin-top:30px;
        }
        hr{
            color:white;
            border: 1px solid white;
        }
    </style>
@endsection
