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
                <input type="email" class="form-control email" id="recipient-name" name="email">
            </div>
            <div class="form-group">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-danger" value="Gửi" id="register"/>
        </div>
        </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#register").click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var email = $('.email').val();
            $.ajax({
                url: "/ForgotPassword",
                type:'POST',
                data: {_token:_token, email:email},
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