@extends('Frontend.Layout.master')
@section('content')
<div class="container " >
    <div class="modal-header">
        <h5 class="modal-title title-rg" id="exampleModalLabel">lẤY LẠI MẬT KHẨU</h5>
    </div>
    <div class="modal-body register">
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
        <form id="demoForm" action="/ForgotPassword/" method="post">
            @csrf
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">NHẬP EMAIL MÀ BẠN ĐĂNG KÍ:</label>
                <input type="email" class="form-control name" id="recipient-name" name="email">
            </div>
            <div class="form-group">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" value="Gửi" id="register"/>
        </div>
        </div>
        </form>
    </div>
</div>
@endsection