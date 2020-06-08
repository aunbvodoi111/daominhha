<!DOCTYPE html>   
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

@if (isset($seotitle))
	<title>Tải về {{$seotitle->Name}} full crack Google Drive - Daominhha.com</title>
@elseif(isset($seotitleallgames))
	<title>Tải game miễn phí - Download Game Offline Free link Google Drive - Daominhha.com</title>
@elseif(isset($seotitletheloai))
	<title>Tải game miễn phí - Thể loại {{$seotitletheloai->Name}} link Google Drive - Daominhha.com</title>
@elseif(isset($seotitlegameviethoa))
	<title>Tải game việt hóa Crack miễn phí Google Drive - Daominhha.com</title>
@else
	<title>Daominhha.com - Web tải game ứng dụng miễn phí Google Drive</title>
@endif

@if (isset($seotitleallgames))
	<link rel="canonical" href="{{Request::url()}}?page={{$curentpage}}" />
@elseif(isset($seotitlegamexemnhieu))
	<link rel="canonical" href="{{Request::url()}}?page={{$curentpage}}" />
@elseif(isset($seotitletheloai))
	<link rel="canonical" href="{{Request::url()}}?page={{$curentpage}}" />
@elseif(isset($seotitlegameviethoa))
	<link rel="canonical" href="{{Request::url()}}?page={{$curentpage}}" />
@else
	<link rel="canonical" href="{{Request::url()}}" />
@endif

@if (isset($seotitle))
	<meta name="keywords" content="{{$seotitle->Name}}, tải về, daominhha, google drive, web tải game, game crack, tai game, game {{$seotitle->Name}} crack miễn phi ,tai game {{$seotitle->Name}} mien phi, download game ,daominhha.com, tai ve" />
@elseif(isset($seotitleallgames))
	<meta name="keywords" content="all games, tai ve, tải về, daominhha, google drive, web tải game, game crack, tai game, game crack miễn phi ,tai game mien phi, download game ,daominhha.com" />
@elseif(isset($seotitletheloai))
	<meta name="keywords" content="{{$seotitletheloai->Name}}, tai ve, tải về, daominhha, google drive, web tải game, game crack, tai game, game crack miễn phi ,tai game mien phi, download game ,daominhha.com" />
@elseif(isset($seotitlegameviethoa))
	<meta name="keywords" content="Game việt hóa, viet hoa, đào minh hà, daominhha, web tải game việt hóa, game crack việt hóa, tai game việt hóa, game việt hóa crack miễn phi ,tai game việt hóa mien phi, download game việt hóa, daominhha.com" />
@else
	<meta name="keywords" content="index, trang chủ, tải về, tai ve, google drive, daominhha, web tải game, game crack, tai game, game crack miễn phi ,tai game mien phi, download game ,daominhha.com" />
@endif

    <meta name="author" content="daominhha.com" />

@if (isset($seotitle))
	<meta name="description" content="Tải game {{$seotitle->Name}} miễn phí, Tai ve {{$seotitle->Name}} full crack link google drive, download {{$seotitle->Name}} free crack pc Google Drive hướng dẫn cài đặt" />
@elseif(isset($seotitletheloai))
	<meta name="description" content="Tải game thể loại {{$seotitletheloai->Name}} miễn phí - Download game offline full crack pc Google Drive - Download game link Google drive" />
@elseif(isset($seotitlegameviethoa))
	<meta name="description" content="Tải game việt hóa miễn phí - Download game offline việt hóa full crack pc - Download game việt hóa link Google drive" />
@else
	<meta name="description" content="Website tải game offline crack miễn phí link Google Drive. Tổng hợp link google drive tải game tốc độ cao" />
@endif

<meta property="og:locale" content="en_US" />
   	<meta property="og:type" content="article" />
@if (isset($seotitle))
	<meta property="og:title" content="Tải game {{$seotitle->Name}} miễn phí full crack - Daominhha.com" />
@elseif(isset($seotitletheloai))
	<meta property="og:title" content="Tải game {{$seotitletheloai->Name}} miễn phí full crack - Daominhha.com" />
@elseif(isset($seotitlegameviethoa))
	<meta property="og:title" content="Tải game việt hóa miễn phí full crack - Daominhha.com" />
@else
	<meta property="og:title" content="Daominhha.com - Web tải game và ứng dụng crack miễn phí" />
@endif

@if (isset($seotitle))
	<meta property="og:description" content="Tải game {{$seotitle->Name}} miễn phí, Tai game {{$seotitle->Name}} full crack link google drive, download {{$seotitle->Name}} free crack pc hướng dẫn cài đặt" /> 
@elseif(isset($seotitletheloai))
	<meta property="og:description" content="Tải game thể loại {{$seotitletheloai->Name}} miễn phí - Download game offline full crack pc - Download game link Google drive" /> 
@elseif(isset($seotitlegameviethoa))
	<meta property="og:description" content="Tải game việt hóa miễn phí - Download game offline việt hóa full crack pc - Download game việt hóa link Google drive" />
@else
	<meta property="og:description" content="Tải game offline full crack miễn phí link google drive" />
@endif
    
@if (isset($seotitle))
	<meta property="og:url" content="https://daominhha.com/games-detail/{{$seotitle->TenKhongDau}}/{{$seotitle->id}}.html" />
@elseif(isset($seotitleallgames))
	<meta property="og:url" content="https://daominhha.com/all-games.html" />
@elseif(isset($seotitletheloai))
	<meta property="og:url" content="https://daominhha.com/games-theloai/{{$seotitletheloai->TenKhongDau}}/{{$seotitletheloai->id}}.html" />
@elseif(isset($seotitlegameviethoa))
	<meta property="og:url" content="{{url()->full()}}" />
@else
	<meta property="og:url" content="https://daominhha.com/" />
@endif
    
    <meta property="og:site_name" content="Dao Minh Ha" />

@if (isset($seotitle))
	<meta property="og:image" content="{{$seotitle->AnhChinh}}" />
@endif
   	

@if (isset($seotitle))
	<meta property="article:tag" content="Tải game {{$seotitle->Name}} miễn phí" />
@elseif(isset($seotitletheloai))
	<meta property="article:tag" content="Tải game {{$seotitletheloai->Name}} miễn phí" />
@elseif(isset($seotitlegameviethoa))
	<meta property="article:tag" content="Tải game việt hóa miễn phí" />
@else
	<meta property="article:tag" content="Tải game offline miễn phí" />
@endif

    <meta content="INDEX,FOLLOW" name="robots" />
    <meta name="copyright" content="Copyright 2018 Đào Minh Hà" />
    <meta http-equiv="audience" content="General" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <meta name="revisit-after" content="1 days" />
    <meta name="GENERATOR" content="Web tải game miễn phí  Đào minh hà" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!--Commnent Facebook-->
    <meta property="fb:app_id" content="677022109487392"/>
    <meta property="fb:admins" content="100004227121889"/>
    <!---------------------->

    <link rel="icon" type="image/png" href="assets/images/red-q.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Xac minh Google Console-->
    <meta name="google-site-verification" content="tH3Z1vLtUH-gCNWjfrr5sjwToWMGhTQn7o_38uxOy4A" />

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129682096-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-129682096-1');
	</script>
	<script type="application/ld+json">
		{
	  	"@context": "http://schema.org/",
	  	"@type": "Game",
		"url": "https://daominhha.com/",
		"email":"hamieu1@gmail.com", 	
	  	"description": "Website tải game offline miễn phí, Download game offline free, tải game, download game pc, tải game link google drive, tai game, free game download, Daominhha",
	  	"name": "Tải game",		
	  	"sameAs" : [ "https://www.facebook.com/daominhha",
	    	"https://www.youtube.com/channel/UCXlGbmpc_iv-1UDXMgaC-sQ?view_as=subscriber"]
		}
	</script>
	<!--------------------------------------------------------->
    <script>
        var adlinkfly_url = 'https://1shortlink.com/';
        var adlinkfly_api_token = '20e28c7c26d2f2071f6357e5d2f96e8deb4face8';
        var adlinkfly_advert = 2;
        var adlinkfly_domains = ['drive.google.com', 'www.fshare.vn','webtaigame.daominhha.com','4share.vn', 'fnote.net', 'mega.nz', 'anotepad.com', 'bnotepad.com', '1drv.ms', 'yadi.sk', 'lopteup.vip'];
    </script>
    <script src='https://1shortlink.com/js/shorten.js'></script>
    <!----------------------------------------------------------->

    <!-- START: Styles -->

    <!-- Google Fonts -->
	<base href="{{asset('/frontend')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <script defer src="assets/vendor/fontawesome-free/js/all.js"></script>
    <script defer src="assets/vendor/fontawesome-free/js/v4-shims.js"></script>

    <!-- IonIcons -->
    <link rel="stylesheet" href="assets/vendor/ionicons/css/ionicons.min.css">
    
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>


    <!-- Flickity -->
    <link rel="stylesheet" href="assets/vendor/flickity/dist/flickity.min.css">

    <!-- Photoswipe -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/photoswipe/dist/photoswipe.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/photoswipe/dist/default-skin/default-skin.css">

    <!-- Seiyria Bootstrap Slider -->
    <link rel="stylesheet" href="assets/vendor/bootstrap-slider/dist/css/bootstrap-slider.min.css">

    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/summernote/dist/summernote-bs4.css">

    <!-- GoodGames -->
    <link rel="stylesheet" href="assets/css/goodgames.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/custom.css">
    
    <!-- END: Styles -->

    <!-- jQuery -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script> 
    <meta name="clckd" content="da112143ab2097880e9e0ad451cd78a1" />
    
    <!--Block iframe-->
    <script language="JavaScript">
        if (top.location != self.location)
        {top.location = self.location}
        window.addEventListener('keyup', function(e){
            if(e.key === 'F12')
            {
                var token =$("input[name='_token']").val();  	
                $.ajax({
                    url:'userCheckF',
                    type:'post',
                    dataType: 'json',
                    data:{"_token":token},
                }).done(function(json) {
                    // console.log(json)
                })
            }
        });
    </script>
</head>

<body >
<header class="nk-header nk-header-opaque">
<div class="nk-contacts-top">
    <div class="container">
        <div class="nk-contacts-left">
            <ul class="nk-social-links">
                <li><a class="nk-social-rss" href="{{asset('/')}}" target="_blank"><span class="fa fa-rss"></span></a></li>
                <li><a class="nk-social-twitch" href="{{asset('/')}}" target="_blank"><span class="fab fa-twitch"></span></a></li>
                <li><a class="nk-social-steam" href="{{asset('/')}}" target="_blank"><span class="fab fa-steam"></span></a></li>
                <li><a class="nk-social-facebook" href="https://www.facebook.com/taigameoffline/?modal=admin_todo_tour" target="_blank"><span class="fab fa-facebook"></span></a></li>
                <li><a class="nk-social-google-plus" href="https://www.google.com/search?ei=VcxGXdfjG9XbhwPWgbL4Ag&q=daominhha&oq=daominhha&gs_l=psy-ab.3..0.2844979.2845990..2846191...0.0..0.176.865.7j2......0....1..gws-wiz.......0i131i67j0i131j0i67j0i10j0i10i30j0i30j38.iKlDvoDG88Q&ved=0ahUKEwiX4ovbmOnjAhXV7WEKHdaADC8Q4dUDCAo&uact=5" target="_blank"><span class="fab fa-google-plus"></span></a></li>
                <li><a class="nk-social-twitter" href="{{asset('/')}}" target="_blank"><span class="fab fa-twitter"></span></a></li>
                <li><a class="nk-social-pinterest" href="{{asset('/')}}" target="_blank"><span class="fab fa-pinterest-p"></span></a></li>
            </ul>
        </div>
        <div class="nk-contacts-right">
            <ul class="nk-social-links">
               @if(\Auth::user())
                    <div class="dropdown a-login show">
                        <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Xin chào : {{\Auth::user()->email}}
                        </a>
                        <div class="dropdown-menu menu-a-drop" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{url('profile')}}">Hồ sơ cá nhân</a>
                            <a class="dropdown-item" href="{{url('donate')}}">Donate</a>
                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalseen" data-whatever="@mdo" >Game đã tải hôm nay</a>
                            <a class="dropdown-item" href="#">Thông báo</a>
                            <a class="dropdown-item" href="{{url('logout')}}">Thoát</a>
                        </div>
                    </div>
               @else
                    <p style="margin-right: 20px;cursor:pointer;"><i class="fas fa-user" data-toggle="modal" data-target="#exampleModal"></i></p>
               @endif
            </ul>
        </div>
    </div>
</div>

<style>
    .modal-backdrop{
        display: none;
    }
</style>
    <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
        <div class="container">
            <div class="nk-nav-table">
                
                <a href="{{asset('/')}}" class="nk-nav-logo">
                    <img src="assets/images/logo.png" alt="GoodGames" width="199">
                </a>
                
                <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">
                    
        <li>
            <a href="{{asset('/')}}">Home</a>                    
        </li>
        <li class=" nk-drop-item">
			<a href="{{asset('all-games.html')}}">Games</a>
				<ul class="dropdown"> 
                    @foreach ($theloaiall as $items)           
                        <li>
                            <a href="{{asset('games-theloai/'.$items->TenKhongDau.'/'.$items->id.'.html')}}">{{$items->Name}}</a>
                        </li>
                    @endforeach
            	</ul>
        </li>
        <li>
            <a href="{{asset('games-xemnhieu.html')}}">Xem nhiều nhất</a>
        </li>
        <li>
            <a href="{{asset('games-viethoa.html')}}">Game Việt Hóa</a>
        <li>
			<a href="{{asset('donate')}}" target="_blank">Donate</a>
		</li>
		<li>
			<a href="#" data-toggle="modal" data-target="#modalSearch">
				<span class="fa fa-search"></span>
			</a>
		</li>
                </ul>
                <ul class="nk-nav nk-nav-right nk-nav-icons">
                    
                        <li class="single-icon d-lg-none">
                            <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                                <span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
                            </a>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><span style="color:red">Đăng</span> nhập</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                @csrf
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Email:</label>
                  <input type="email" class="form-control emaillg" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Password:</label>
                    <input type="password" class="form-control passwordlg" id="recipient-name">
                  </div>
              </form>
              <p><a href="/ForgotPassword">Quên mật khẩu</a></p>
              <p style="margin-top:-10px;"><a href="/login" >Đăng kí thành viên</a></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              <button type="button" class="btn btn-primary" id="loginpop">Đăng nhập</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModalseen" tabindex="-1" role="dialog" aria-labelledby="exampleModalseen" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalseen"><span style="color:red">Game</span> đã tải hôm nay</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div id="search-data">
                    <div class="search-info" style="height:auto">
                        @if (\Auth::user())
                            @if(count($link_loaded->link_loaded) > 0)
                                <table class="table-search">	
                                    @foreach ($link_loaded->link_loaded as $items)			
                                        <tr>
                                            <td><a href="{{asset('games-detail/'.$items->game_loaded->TenKhongDau.'/'.$items->game_loaded->id.'.html')}}" target="_blank"><img src="{{$items->game_loaded->AnhChinh}}" width="120px" height="70px"></a></td>
                                            <td><a class="title-game-search" href="" target="_blank">{{$items->game_loaded->Name}}</a></td>
                                        </tr>
                                    @endforeach
                            </table>
                        @endif
                        @else
                            <h3><a href="/all-games.html">Hôm nay bạn chưa tải game nào click vào đây để tải game</a></h3>
                        @endif
					</div> 
				</div>
               
              </form> 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>
</header>

<script>
    $(document).ready(function() {
        $("#loginpop").click(function(e){
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
    $(document).ready(function(){
        $('#register').click(function(){
            var name =$('.name').val();
            var email =$('.email').val();
            var password =$('.password').val();
            var token =$("input[name='_token']").val();  	
            $.ajax({
                url:'aaaa',
                type:'post',
                dataType: 'json',
                data:{"_token":token,"name":name,"email":email,'password':password},
            }).done(function(json) {
                // console.log(json)
                if(json.msg == 'success'){
                    swal(json.msg, json.data, json.msg)
                }else{
                    swal(json.msg, json.code.error, json.msg)
                }
            })
        });	
    });
</script>

<style>
    .dropdown-menu {
        z-index : 10001;
    }
    .a-login a{
        display: block;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        color: white;
    }

    .page-item.active .page-link {
        min-width: 42px !important;
        height: 42px !important;
        padding: 3px !important;
        line-height: 28px !important;
        color: #dd163b !important;
        border: 4px solid !important;
        border-radius: 21px !important;
    }
    .menu-a-drop a{
        color: black;
    }
    .page-link {
        display: flex;
        flex-wrap: wrap;
        font-size: 1.7rem;
        font-weight: 600;
        border-radius: 100% !important;
        color: #fff !important;
        background-color: black !important;
        border: none !important;
        display: block !important;
    }
</style>