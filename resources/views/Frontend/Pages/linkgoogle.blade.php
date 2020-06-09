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
        <h3>Mật khẩu: <span style="text-transform: none;">{{$totalGame->password}}</span></h3>
        <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
        </div>
        <form id="demoForm" >
            @csrf
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">MẬT KHẨU:</label>
                <input class="form-control code" id="recipient-name" type="text" >
            </div>
            <div class="form-group">
            <label for="captcha">Captcha</label>
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            </div>
        
        </div>
        </form>
        <div class="modal-footer">
            <input type="submit" value="Đồng ý" class="register nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-info"/>
        </div>
        </div>
        
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.register').click(function(){
            var name ={{$data->id}};
            var code =$('.code').val();
            var token =$("input[name='_token']").val();  
            $.ajax({
                url:'checkpasslink',
                type:'post',
                dataType: 'json',
                data:{"_token":token,"name":name,'code':code},
            }).done(function(json) {
                if(json.susscess){
                    window.location.href = json.susscess.link;
                }else if(json.error){
                    alert('Bạn chưa nhập mật khẩu')
                }else if(json.errCode){
                    alert('Nhập sai mật khẩu')
                }
            })
        });	
        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });
</script>
@endsection

