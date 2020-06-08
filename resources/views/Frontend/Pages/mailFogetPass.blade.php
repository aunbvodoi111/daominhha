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
            <input type="button" class="btn btn-danger" value="Gửi" id="forget"/>
        </div>
        </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#forget").click(function(e){
            e.preventDefault();
            var _token = $("input[name='_token']").val();
            var email = $('.email').val();
            $.ajax({
                url: "/ForgotPassword",
                type:'POST',
                data: {_token:_token, email:email, g_recaptcha_response: grecaptcha.getResponse()},
                success: function(data) {
                    if(data.success){
                        swal('Thành công','Bạn vui lòng đăng nhập vào email của bạn','success')
                        $('.namere').val('');
                        $('.passwordre').val('');
                        $('.emailre').val('');
                        $('.password_confirmedre').val('');
                    }else if(data.error){
                        swal('Lỗi mail','Email không tồn tại.Xin vui lòng nhập lại!','error')
                    }else if(data.capcha){
                        swal('Lỗi capcha','Xin vui lòng click vào capcha','error')
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