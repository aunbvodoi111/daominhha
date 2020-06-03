@extends('Frontend.Layout.master')
@section('content')
<div class="container">
    <div class="modal-header">
        <h5 class="modal-title title-lg" id="exampleModalLabel">Đăng nhập</h5>
    </div>
    <div class="modal-body login">
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
        <div class="alert alert-danger print-error-msg-lg" style="display:none">
            <ul></ul>
        </div>
        <form id="demoForm" action="{{url('admin/login')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">EMAIL:</label>
                <input type="text" class="form-control emaillg" id="recipient-name" name="email">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">MẬT KHẨU:</label>
                <input type="password" class="form-control passwordlg" id="recipient-name" id="password" type="password" name="password">
            </div>
            <div class="form-group">
        </div>
        <div class="modal-footer">
            <a href="/ForgotPassword">Quên mật khẩu?</a>
            <button class="nk-btn nk-btn-rounded nk-btn-color-white" id="login">
                <span>Send</span>
                <span class="icon"><i class="ion-paper-airplane"></i></span>
            </button>
           
        </div>
        </div>
        </form>
    </div>
</div>

<div class="container " >
    <div class="modal-header">
        <h5 class="modal-title title-rg" id="exampleModalLabel">Đăng kí</h5>
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
        <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>
        <form id="demoForm" action="{{url('aaaa')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">TÊN CỦA BẠN:</label>
                <input type="text" class="form-control namere" id="recipient-name" name="name">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">EMAIL:</label>
                <input type="text" class="form-control emailre" id="recipient-name" name="email">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">TÊN ĐĂNG NHẬP:</label>
                <input type="text" class="form-control namere" id="recipient-name" name="name">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">MẬT KHẨU:</label>
                <input type="password" class="form-control passwordre" id="recipient-name" id="password" type="password" name="password">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">NHẬP LẠI MẬT KHẨU:</label>
                <input type="password" class="form-control password_confirmedre" id="recipient-name" name="password_confirmed">
            </div>
            <div class="form-group">
            <label for="captcha">Captcha</label>
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            </div>
        
        </div>
        <div class="modal-footer">
            <button class="nk-btn nk-btn-rounded nk-btn-color-white" id="gui">
                <span>Send</span>
                <span class="icon"><i class="ion-paper-airplane"></i></span>
            </button>
           
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
    $(document).ready(function() {
        $("#gui").click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var name = $('.namere').val();
            var password = $('.passwordre').val();
            var email = $('.emailre').val();
            var password_confirmed = $('.password_confirmedre').val();
            $.ajax({
                url: "/aaaa",
                type:'POST',
                data: {_token:_token, name:name, password:password, email:email, password_confirmed:password_confirmed, g_recaptcha_response: grecaptcha.getResponse()},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        swal('Thành công','Bạn vui lòng xác nhận email','success')
                        $('.namere').val('');
                        $('.passwordre').val('');
                        $('.emailre').val('');
                        $('.password_confirmedre').val('');
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });


        }); 
        function printErrorMsg (msg) {
            console.log(msg)
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });

    $(document).ready(function() {
        $("#login").click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var password = $('.passwordlg').val();
            var email = $('.emaillg').val();
            $.ajax({
                url: "/admin/login",
                type:'POST',
                data: {_token:_token,password:password, email:email},
                success: function(data) {
                    if(data.success){
                        swal('Thành công','Bạn vui lòng xác nhận email','success')
                        $('.namere').val('');
                        $('.passwordre').val('');
                        $('.emailre').val('');
                        $('.password_confirmedre').val('');
                    }else if(data.errorr){
                        swal('Lỗi đăng nhập','Vui lòng kiểm tra lại tải khoản mật khẩu','error')
                    }
                    else{
                        printErrorMsgg(data.error);
                    }
                }
            });


        }); 
        function printErrorMsgg (msg) {
            console.log(msg)
            $(".print-error-msg-lg").find("ul").html('');
            $(".print-error-msg-lg").css('display','block');
            
            $.each( msg, function( key, value ) {
                $(".print-error-msg-lg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });
</script>
@endsection