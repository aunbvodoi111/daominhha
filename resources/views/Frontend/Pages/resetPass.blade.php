@extends('Frontend.Layout.master')
@section('content')
<div class="container " >
    @if($user)
        <div class="modal-header">
            <h5 class="modal-title title-rg" id="exampleModalLabel">Thay đổi mật khẩu</h5>
        </div>
        <div class="modal-body register">
            @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>  
            @endif
            <form id="demoForm" action="/changePasswordFoget/{{$token}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">MẬT KHẨU:</label>
                    <input type="password" class="form-control password" id="recipient-name" id="password" type="password" name="new-password">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">NHẬP LẠI MẬT KHẨU:</label>
                    <input type="password" class="form-control name" id="recipient-name" name="new-password_confirmation">
                </div>
                <div class="form-group">
                <label for="captcha">Captcha</label>
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                </div>
            
            </div>
            <div class="modal-footer">
                <input type="submit" value="Register" id="Gửi"/>
            </div>
            </div>
            </form>
        </div>
    @else
        <h5 style="margin:100px;text-align:center">Trang này không hợp lệ. Trở về <a href="/">trang chủ</a></h5>
    @endif
</div>

@endsection