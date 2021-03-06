@extends('Frontend.Layout.master')
@section('content')
<div class="container " >
    @if($totalGame->colse_register == 1)
        <div class="modal-header pr-tit">
            <h1 class="h1-title" style="text-align: center">Đăng kí</h1>
        </div>
        <div class="modal-body register">
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
                @csrf
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
                <div class="modal-footer">
                    <button class="nk-btn nk-btn-rounded nk-btn-color-white" id="gui">
                        <span>Gửi</span>
                        <span class="icon"><i class="ion-paper-airplane"></i></span>
                    </button>
                </div>
            </div>
            
            </div>
        </div>
    @elseif($totalGame->colse_register == 0)
        <h1>Chức năng đăng kí đã tắt để bảo trì web. Xin cảm ơn!</h1>
    @endif
</div>
@if(\Auth::user())
    <script>
        window.location.href = '/'
    </script>
@endif
<style>
    .title-rg{
        cursor: pointer;
    }
    h1{
        margin: 200px 0px;
    }
</style>
<script>
 
    $(document).ready(function() {
        $("#gui").click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var name = $('.namere').val();
            var password = $('.passwordre').val();
            var email = $('.emailre').val();
            var password_confirmed = $('.password_confirmedre').val();
            $.ajax({
                url: "https://toplinkvip.com/aaaa",
                type:'POST',
                data: {_token:_token, name:name, password:password, email:email, password_confirmed:password_confirmed, g_recaptcha_response: grecaptcha.getResponse()},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        swal('Thành công','Bạn vui lòng xác nhận email','success')
                        $('.namere').val('');
                        $('.passwordre').val('');
                        $('.emailre').val('');
                        $('.password_confirmedre').val('');
                        setTimeout(function(){ 
                        window.location.href = '/login' 
                        window.location.href = '/' }, 500);
                        setTimeout(function(){ 
                        window.location.href = '/login' 
                        window.location.href = '/' }, 700);
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
                url: "https://toplinkvip.com/admin/login",
                type:'POST',
                data: {_token:_token,password:password, email:email},
                success: function(data) {
                    if(data.success){
                        swal('Thành công','Bạn vui lòng xác nhận email','success')
                        $('.namere').val('');
                        $('.passwordre').val('');
                        $('.emailre').val('');
                        $('.password_confirmedre').val('');
                        setTimeout(function(){ window.location.href = '/' }, 1200);
                    }
                    else if(data.er1){
                        swal('Lỗi đăng nhập','Bạn chưa xác nhận email cho tải khoản này','error')
                    }else if(data.er2){
                        swal('Lỗi đăng nhập','Bạn vui lòng liên hệ với https://www.facebook.com/DaominhhaTaiGameMienPhi để được kích hoạt tài khoản','error')
                    }
                    else if(data.errorr){
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

<style>
    .pr-tit::after {
        margin-top:42px; 
        content: "";
        display: block;
        -webkit-box-flex: 100;
        -ms-flex: 100;
        flex: 100;
        border-bottom: 4px solid #dd163b;
        -webkit-transform: translateY(-12px);
        -ms-transform: translateY(-12px);
        transform: translateY(-12px);
    }
</style>
@endsection