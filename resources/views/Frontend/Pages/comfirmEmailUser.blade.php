@extends('Frontend.Layout.master')
@section('content')
<div class="container " >
    @if($user)
        <div id="content" class="section content-wrap content-info">
            <div class="container clearfix">
                <div class="travel-info-wrap">
                    <div class="page-title ta-c fw-rbm fs-30 fc-black">Kích hoạt tài khoản</div>
                    <div class="fs-14 fc-black" align="center">
                        <p class="fw-ob">Chúc mừng bạn đã kích hoạt tài khoản thành công.</p>
                        <p>Bạn đã có thể sử dụng email <span class="fw-ob">{{ $user->email }}</span> để <a href="/login">Đăng nhập</a> vào hệ thống ngay bây giờ.</p>
                        <p>Kích hoạt tài khoản vui lòng inbox fanpage <a href="https://www.facebook.com/DaominhhaTaiGameMienPhi">Daominhha.com - Tải Game Miễn Phí</a></p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h5>Trang này không hợp lệ. Trở về <a href="/">trang chủ</a></h5>
    @endif
</div>

@endsection