@extends('Frontend.Layout.master')
@section('content')
<div class="container">
    <div class="modal-body">
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
        <div class="container">
            <a href="{{asset($data->link)}}" class="cen nk-btn nk-btn-rounded nk-btn-outline nk-btn-color-warning">Click vào đây để lấy link</a>
        </div>
        <!--<h3>Mật khẩu: <span style="text-transform: none;">{{$totalGame->password}}</span></h3>-->
        <!--<div class="alert alert-danger print-error-msg" style="display:none">-->
        <!--    <ul></ul>-->
        <!--</div>-->
        <!--<form id="demoForm" >-->
        <!--    @csrf-->
        <!--    <div class="form-group">-->
        <!--        <label for="recipient-name" class="col-form-label">MẬT KHẨU:</label>-->
        <!--        <input class="form-control code" id="recipient-name" type="text" >-->
        <!--    </div>-->
        <!--    <div class="form-group">-->
        <!--    <label for="captcha">Captcha</label>-->
        <!--        {!! NoCaptcha::renderJs() !!}-->
        <!--        {!! NoCaptcha::display() !!}-->
        <!--    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>-->
        <!--    </div>-->
        
        <!--</div>-->
        <!--</form>-->
        <!--<div class="modal-footer">-->
        <!--    <input type="submit" value="Đồng ý" class="register nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-info"/>-->
        <!--</div>-->
        <!--</div>-->
        
    </div>
</div>
<style>
    .cen {
        padding:2em;
        text-align: center;
        display:inline-block;
        text-decoration: none !important;
        margin:0 auto;
        height:60px;
        line-height:40px;
        -webkit-transition: all 0.2s ease-in-out;
        -moz-transition: all 0.2s ease-in-out;
        -ms-transition: all 0.2s ease-in-out;
        -o-transition: all 0.2s ease-in-out;
        transition: all 0.2s ease-in-out;
        margin:200px 0px;
    }
    
    .container{
      width: 100%;
      text-align: center;
    
    }
</style>

@endsection

