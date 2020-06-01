@extends('Frontend.Layout.master')
@section('content')
<div class="container " >
    <div class="modal-header">
        <h5 class="modal-title title-rg" id="exampleModalLabel">Thay đổi mật khẩu</h5>
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
        <form id="demoForm" action="/changePasswordFoget/{{$token}}" method="post">
            @csrf
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">MẬT KHẨU:</label>
                <input type="text" class="form-control password" id="recipient-name" id="password" type="password" name="password">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">NHẬP LẠI MẬT KHẨU:</label>
                <input type="text" class="form-control name" id="recipient-name" name="password_confirmed">
            </div>
            <div class="form-group">
            <label for="captcha">Captcha</label>
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <input type="submit" value="Register" id="register"/>
        </div>
        </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.register').hide();
        $('.title-rg').click(function(){
            $('.login').hide();
            $('.register').show();
        })
        $('.title-lg').click(function(){
            $('.register').hide();
            $('.login').show();
        })
    })
</script>
@endsection