@extends('Frontend.Layout.master')
@section('content')
<div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
    <div class="nano">
        <div class="nano-content">
            <a href="index.html" class="nk-nav-logo">
                <img src="assets/images/logo.png" alt="" width="120">
            </a>
            <div class="nk-navbar-mobile-content">
                <ul class="nk-nav">
                    <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END: Navbar Mobile -->
    <div class="nk-main">        
            <!-- START: Breadcrumbs -->
<div class="nk-gap-1"></div>
<div class="container">
    <ul class="nk-breadcrumbs">
        <li><a href="{{asset('/')}}">Home</a></li>
        <li><span class="fa fa-angle-right"></span></li>
        <li><a href="{{url()->current()}}">Thể loại</a></li>
        <li><span class="fa fa-angle-right"></span></li>
        <li><span>{{$theloaigame->Name}}</span></li>   
    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->

<div class="container">
    <div class="nk-blog-grid">
        <div class="row">
		@foreach ($gamestheloai as $items)
            <div class="col-md-6 col-lg-3">
                <!-- START: Post -->
                <div class="nk-blog-post">
                    <a href="{{asset('games-detail/'.$items->tag_games->TenKhongDau.'/'.$items->tag_games->id.'.html')}}" class="nk-post-img">
					@if ($items->Avatar != "")
                        <img src="{{$items->tag_games->Avatar}}" alt="{{$items->tag_games->TenKhongDau}}" id="anh">
					@else
						<img src="{{$items->tag_games->AnhChinh}}" alt="{{$items->tag_games->TenKhongDau}}" id="anh">
					@endif
                        <span class="nk-post-comments-count">{{$items->tag_games->SoLuotXem}}</span>   
                    </a>
                    <div class="nk-gap"></div>
                    <h2 class="nk-post-title h4"><a href="{{asset('games-detail/'.$items->tag_games->TenKhongDau.'/'.$items->tag_games->id.'.html')}}">{{$items->tag_games->Name}}</a></h2>
                    <div class="nk-post-text">
                        <p>Thể loại: {{$items->tag_games->TheLoai}}</p>
                    </div>
                    <div class="nk-gap"></div>
                    <a href="{{asset('games-detail/'.$items->tag_games->TenKhongDau.'/'.$items->tag_games->id.'.html')}}" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Tải game</a>
                    <div class="nk-post-date float-right"><span class="fa fa-calendar"></span> {{date('d-m-Y', strtotime($items->tag_games->created_at))}}</div>
                </div>
                <!-- END: Post -->
            </div>
        @endforeach         
        </div>
        <div style="text-align: center; margin-top: 20px;">
            {{$gamestheloai->links()}}
        </div>
        <div style="margin-top: 26px; text-align: -webkit-center;">
            <!-- Admarket - Ad Display Code -->
            <div id="adm-container-2451"></div><script data-cfasync="false" async type="text/javascript" src="//adworkmedia.net/display/items.php?2451&137&728&90&4&0&0"></script>
            <!-- Admarket - Ad Display Code -->
        </div>
    </div>
</div>

<div class="nk-gap-2"></div>
<style>
    .pagination {
        display: inline-flex;
    }
    .pagination li {
        font-size: 17px;
    }
</style>
@endsection