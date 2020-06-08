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
        <li><a href="index.html">Home</a></li>
        <li><span class="fa fa-angle-right"></span></li>       
        <li><a href="#">{{$games->Name}}</a></li>
        <li><span class="fa fa-angle-right"></span></li>     
        <li><h1 class="h1-title">{{$games->Name}}</h1></li>  
    </ul>
</div>
<div class="nk-gap-1"></div>
<!-- END: Breadcrumbs -->
<div class="container">
    <div class="row vertical-gap">
        <div class="col-lg-8">
            <!-- START: Post -->
            <div class="nk-blog-post nk-blog-post-single">
                <!-- START: Post Text -->
                <div class="nk-post-text mt-0">
                    <div class="nk-post-img">
                        <img src="{{$games->AnhChinh}}" alt="{{$games->TenKhongDau}}">
                    </div>
                    <div class="nk-gap-1"></div>
                    <h1 class="nk-post-title h4">{{$games->Name}}</h1>
                    <div class="nk-post-by">
                        <img src="assets/images/48359820_2411439048869621_9089046097153753088_n.png" alt="Witch Murder" class="rounded-circle" width="35"> by <a href="{{url()->current()}}">Admin</a> {{date('d-m-Y', strtotime($games->created_at))}} 
                    </div>
                    <div class="nk-gap"></div>
                    <h3 class="h4">Chi tiết game</h3>
                    <span style="font-weight: 600;">Tên: </span><span>{{$games->Name}}</span>
                    <br>
                    <span style="font-weight: 600;">Ngày update: </span><span>{{date('d-m-Y', strtotime($games->created_at))}}</span>
                    <br>
                    <span style="font-weight: 600;">Thể loại: </span><span>{{$games->TheLoai}}</span>
                    <br>
                    <span style="font-weight: 600;">Lượt xem: </span><span>{{$games->SoLuotXem}}</span>
                    <br>
                    <span style="font-weight: 600;">Kích thước: </span><span>{{$games->KichThuoc}}</span>
                    <br>
                    <span style="font-weight: 600;">Số Part: </span><span>{{$games->SoPart}}</span>
                    <br>

<div class="nk-gap"></div>
<blockquote class="nk-blockquote">
    <div class="nk-blockquote-icon"><span>"</span></div>
    <div class="nk-blockquote-content">
        {!! $games->NoiDung !!}
    </div>
    <div class="nk-blockquote-author"></div>
    <h3>Ảnh game</h3>
    <div class="nk-image-slider" data-autoplay="8000">
        <div class="nk-image-slider-item">
            <img src="{{$games->AnhPhu1}}" alt="" class="nk-image-slider-img" data-thumb="{{$games->AnhPhu1}}">         
        </div>
        <div class="nk-image-slider-item">
            <img src="{{$games->AnhPhu2}}" alt="" class="nk-image-slider-img" data-thumb="{{$games->AnhPhu2}}">           
        </div>    
        <div class="nk-image-slider-item">
            <img src="{{$games->AnhPhu3}}" alt="" class="nk-image-slider-img" data-thumb="{{$games->AnhPhu3}}">           
        </div>      
        <div class="nk-image-slider-item">
            <img src="{{$games->AnhPhu4}}" alt="" class="nk-image-slider-img" data-thumb="{{$games->AnhPhu4}}">         
        </div>
    </div>
</blockquote>

<div class="nk-gap"></div>
    <div class="gioithieu">
        {!! $games->GioiThieu !!}
    </div>
    <!--Quang cao Admarket-->
        <!-- Admarket - Ad Display Code -->
        <div style="margin-bottom: 25px;">
            <div id="adm-container-2451"></div><script data-cfasync="false" async type="text/javascript" src="//adworkmedia.net/display/items.php?2451&137&728&90&4&0&0"></script>
        </div>
        <!-- Admarket - Ad Display Code -->
    <!---------------------->
    <div>
        <h6 style="color: yellow; margin-bottom: 30px;">Quan trọng: Nếu như bạn không vào được trang anotepad.com hoặc phản hồi quá lâu thì chỉ cần Reset lại cục mạng (Modem) là được nhé hoặc có thể Fake ip sang USA</h6>
        <h6 style="color: cyan; margin-bottom: 30px;">Thông báo: Hiện tại Fan Page của mình đang bị khóa thế nên các bạn tham gia vào Group này nhé: <a href="https://www.facebook.com/groups/558374361208287/" style="color: red;" target="_blank">Click here</a></h6>
    </div>
   <div class="tot">
    @if ( \Auth::user())
        @if ( $id_loaded == 0)
            @foreach ($games->link_list as $key => $items)
                @if ( $items->list_type->link_ori == 0)
                    @if ( $items->type == 1)
                    <h3>{{$items->title}}</h3>
                    <p class="yellow">{{$items->link}}</p>
                    <h5>{{$items->list_type->link}}</h5>
                        <div class="tt">
                            @foreach ($items->list as $key => $prod)
                           
                                    @if (  ($totalGame->sogame)-count($link_loaded->link_loaded) < ($totalGame->sogame) && ($totalGame->sogame)-count($link_loaded->link_loaded) > 0)
                                        {{-- <a  class="id-link alert" data-toggle="modal" data-target="#exampleModal" attr_id="{{$prod->id}}" target="_blank">Part {{$key + 1}}</a> --}}
                                        @if(count($items->list) > 1)
                                            <a  class="id-link alert" data-toggle="modal" data-target="#exampleModal" attr_id="{{$prod->id}}" target="_blank">Part {{$key + 1}}</a>
                                            {{-- <p href="" class="id-link alert" data-toggle="modal" data-target="#exampleModal" attr_id="{{$prod->id}}">Part {{$key + 1}}</p> --}}
                                        @else
                                            <a  class="id-link alert" data-toggle="modal" data-target="#exampleModal" attr_id="{{$prod->id}}" target="_blank"> Download</a>
                                            {{-- <p href="" class="id-link alert" data-toggle="modal" data-target="#exampleModal" attr_id="{{$prod->id}}">Download</p> --}}
                                            {{-- <p href="" class="id-link alert" data-toggle="modal" data-target="#exampleModal" attr_id="{{$prod->id}}">Download</p> --}}
                                        @endif
                                    @elseif(count($link_loaded->link_loaded) == 0)
                                        @if(count($items->list)  > 1)
                                            <p href="" class="id-link alert" data-toggle="modal" data-target="#exampleModal" attr_id="{{$prod->id}}">Part {{$key + 1}}</p>
                                        @else
                                            <p href="" class="id-link alert" data-toggle="modal" data-target="#exampleModal" attr_id="{{$prod->id}}">Download</p>
                                        @endif
                                        {{-- <p href="" class="id-link alert" data-toggle="modal" data-target="#exampleModal" attr_id="{{$prod->id}}">Part {{$key + 1}}</p> --}}
                                    @elseif ( ($totalGame->sogame)-count($link_loaded->link_loaded) == 0)
                                        @if(count($items->list) > 1)
                                            <p href="" class="id-link alert" data-toggle="modal" data-target="#exampleModal" attr_id="{{$prod->id}}">Part {{$key + 1}}</p>
                                        @else
                                            <p href="" class="id-link alert" data-toggle="modal" data-target="#exampleModal" attr_id="{{$prod->id}}">Download</p>
                                            {{-- <p href="" class="id-link alert" data-toggle="modal" data-target="#exampleModal" attr_id="{{$prod->id}}">Download</p> --}}
                                        @endif
                                        
                                    @endif
                                
                            @endforeach
                        </div>
                    @endif
                @else
                     @if ( $items->type == 1)
                        <h3>{{$items->title}}</h3>
                        <p class="yellow">{{$items->link}}</p>
                        <h5>{{$items->list_type->link}}</h5>
                        <a href="javascript:void(0)"  target="_blank">Hiện tại link đã bị khóa</a>
                     @endif
                @endif
            @endforeach
        @else
            @foreach ($games->link_list as $key => $items)
                @if ( $items->list_type->link_ori == 0)
                    @if ( $items->type == 1)
                        <h3>{{$items->title}}</h3>
                        <p class="yellow">{{$items->link}}</p>
                        <h5>{{$items->list_type->link}}</h5>
                        <p>
                            @foreach ($items->list as $key => $prod)
                                @if(count($items->list) > 1)
                                    <a href="download/{{$prod->id}}"  target="_blank">Part {{$key + 1}}</a>
                                @else
                                    <a href="download/{{$prod->id}}"  target="_blank">Download</a>
                                @endif
                                {{-- <a href="download/{{$prod->id}}"  target="_blank">Part {{$key + 1}}</a> --}}
                            @endforeach
                        </p>
                    @endif
                @endif
            @endforeach
        @endif
        
    @else
        @foreach ($games->link_list as $key => $items)
            @if ( $items->list_type->link_ori == 0)
                @if ( $items->type == 1 && $items->type_link == 1)
                    <h3>{{$items->title}}</h3>
                    <p class="yellow">{{$items->link}}</p>
                    <h5>{{$items->list_type->link}}</h5>
                    <div style="margin-bottom:20px;">
                        <a href="login"  target="_blank" >Đăng nhập để tải game bằng link googledriver</a>
                    </div>
                @elseif ( $items->type == 1 && $items->type_link > 1)
                    <h3>{{$items->title}}</h3>
                    <h5>{{$items->link}}</h5>
                    <h5>{{$items->list_type->link}}:</h5>
                    <p>
                        @foreach ($items->list as $key => $prod)
                            @if(count($items->list) > 1)
                                <a href="download/{{$prod->id}}"  target="_blank">Part {{$key + 1}}</a>
                            @else
                                <a href="download/{{$prod->id}}"  target="_blank">Download</a>
                            @endif
                        @endforeach
                    </p>
                @endif
            @else
                @if ( $items->type == 1)
                    <h3>{{$items->title}}</h3>
                    <p class="yellow">{{$items->link}}:</p>
                    <h5>{{$items->list_type->link}}:</h5>
                    <a href="download/"  target="_blank">Hiện tại link đã bị khóa</a>
                @endif
            @endif
        @endforeach
    @endif   
    @foreach ($games->link_list as $key => $items)
        @if ( $items->list_type->status == 0)
            @if ( $items->type == 2)
                    <h3>{{$items->title}}</h3>
                    <p class="yellow">{{$items->link}}:</p>
                    <h5>{{$items->list_type->link}}:</h5>
                <p>
                    @foreach ($items->list as $key => $prod)
                        @if(count($items->list) > 1)
                            <a href="download/{{$prod->id}}"  target="_blank">Part {{$key + 1}}</a>
                        @else
                            <a href="download/{{$prod->id}}"  target="_blank">Download</a>
                        @endif
                    @endforeach
                </p>
            @endif
        @endif
    @endforeach
</div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="demoForm" action="{{url('store-captcha-form')}}">
        @csrf
        @if ( \Auth::user())
            @if (($totalGame->sogame)-count($link_loaded->link_loaded) < ($totalGame->sogame) && ($totalGame->sogame)-count($link_loaded->link_loaded) > 0 )
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Hôm này bạn đã tải được {{count($link_loaded->link_loaded)}} game. Mỗi ngày chỉ được tải 
                {{$totalGame->sogame}} game bằng link vip bạn còn {{($totalGame->sogame)-count($link_loaded->link_loaded)}} được tải 
                :</label>
                <p>Danh sách game bạn đã tải:</p>
                    @foreach ($link_loaded->link_loaded as $items)
                        <p>
                            <a href="{{asset('games-detail/'.$items->game_loaded->TenKhongDau.'/'.$items->game_loaded->id.'.html')}}">{{$items->game_loaded->Name}}</a>
                        </p>  
                    @endforeach
            </div>
            @elseif(count($link_loaded->link_loaded) == 0)
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Mỗi ngày một user chỉ được tải {{$totalGame->sogame}} game duy nhất có link googledriver
                    :</label>
                    <p>Bạn có muốn tải game:</p>
                    <p><a href="{{asset('games-detail/'.$games->TenKhongDau.'/'.$games->id.'.html')}}">{{$games->Name}}</a></p>
                </div>
            @elseif (($totalGame->sogame)-count($link_loaded->link_loaded) == 0)
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Hôm này bạn đã tải được {{count($link_loaded->link_loaded)}} game. Mỗi ngày chỉ được tải 
                    {{$totalGame->sogame}} game bằng link vip bạn còn {{2-count($link_loaded->link_loaded)}} được tải 
                    :</label>
                    <p>Bạn hiện tại dã hết lượt tải xin cảm ơn</p>
                    <p>Danh sách game bạn đã tải trong hôm nay:</p>
                        @foreach ($link_loaded->link_loaded as $items)
                            <p>
                                <a href="{{asset('games-detail/'.$items->game_loaded->TenKhongDau.'/'.$items->game_loaded->id.'.html')}}">{{$items->game_loaded->Name}}</a>
                            </p>  
                        @endforeach
                </div>
            @endif
        @endif
          <!-- <div class="form-group">
          <label for="captcha">Captcha</label>
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
          <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
        </div> -->
        </form>
      </div>
      <div class="modal-footer">
        @if ( \Auth::user())
            @if (($totalGame->sogame)-count($link_loaded->link_loaded) > 0)
                <a href="" class="btn btn-danger link-re" target="_blank">Đồng ý tải</a>
                <a href="all-games.html" class="btn btn-secondary" >Chọn game khác</a>
            @elseif(($totalGame->sogame)-count($link_loaded->link_loaded) == 0)
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            @endif
        @endif
        
      </div>
    </div>
  </div>
</div>
    <h6 style="color: red; margin-bottom: 30px;">Nếu đây là lần đầu tiên bạn tải game trên Website của mình thì hãy xem kỹ video hướng dẫn cách tải game trước nhé: <a href="https://www.youtube.com/watch?v=aFx7wAOdWQQ" style="color: yellow;" target="_blank">Click here</a></h6>
    <h6 style="color: red; margin-bottom: 30px;">Cách tải Link Yandex không giới hạn xem tại đây: <a href="https://www.youtube.com/watch?v=D2OEHuJpnaE&feature=youtu.be" style="color: violet;" target="_blank">Click here</a></h6>
    <h6 style="color: red; margin-bottom: 30px;">Nếu bị lỗi giải nén các bạn tải phần mềm Winrar này về cài đặt rồi giải nén lại: <a href="https://1drv.ms/u/s!Ag-DLSjBV113gX0laysp24DdEuSs?e=wJg0Pm" style="color: #18f518;" target="_blank">Download</a></h6>
    <h6 style="color: red; margin-bottom: 30px;">Nếu có bất kỳ link tải nào bị lỗi các bạn gửi tin nhắn về FanPage cho mình nhé</h6>
<!----------------------------------------------------------------------------->
    <!--Quang cao Mgid------>
    <!--Quang cao Admarket-->
        <!-- Admarket - Ad Display Code -->
        <!-- Admarket - Ad Display Code -->
        <div style="margin-bottom: 25px;">
            <div id="adm-container-2245"></div><script data-cfasync="false" async type="text/javascript" src="//mumienphi.pro/display/items.php?2245&137&728&90&1&0&0"></script>
        </div>
        <!-- Admarket - Ad Display Code -->
    <!-- Admarket - Ad Display Code -->
    <!--End Mgid---->
                    <div class="nk-gap"></div>
                    <!-- Comment Facebook------------------------- -->
                    <!--<div class="comment" style="width: 100%; background-color: #fff; margin-bottom: 30px;">-->
                    <!--    <div class="fb-comments" data-href="{{Request::url()}}" data-width="700" data-numposts="5"></div>-->
                    <!--    <div id="fb-root"></div>-->
                    <!--</div>-->
                    <!--<div id="fb-root"></div>-->
                    <!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v5.0&appId=677022109487392&autoLogAppEvents=1"></script>-->
                    <!--<div class="fb-comments" style="width: 100%; background-color: #fff; margin-bottom: 30px; data-href="{{Request::url()}}" data-width="700" data-numposts="5"></div>-->
                    <!-- ------------------------------------------- -->
                    <div class="nk-post-share">
                        <span class="h5">Share Article:</span>

                        <ul class="nk-social-links-2">
                            <li><span class="nk-social-facebook" title="Share page on Facebook" data-share="facebook"><span class="fab fa-facebook"></span></span></li>
                            <li><span class="nk-social-google-plus" title="Share page on Google+" data-share="google-plus"><span class="fab fa-google-plus"></span></span></li>
                            <li><span class="nk-social-twitter" title="Share page on Twitter" data-share="twitter"><span class="fab fa-twitter"></span></span></li>
                            <li><span class="nk-social-pinterest" title="Share page on Pinterest" data-share="pinterest"><span class="fab fa-pinterest-p"></span></span></li>

                            <!-- Additional Share Buttons
                                <li><span class="nk-social-linkedin" title="Share page on LinkedIn" data-share="linkedin"><span class="fab fa-linkedin"></span></span></li>
                                <li><span class="nk-social-vk" title="Share page on VK" data-share="vk"><span class="fab fa-vk"></span></span></li>
                            -->
                        </ul>
                    </div>
                    
                    <div class="tagname">
                        <h3><a href="{{asset('all-games.html')}}" target="_blank" title="Tải game miễn phí">Tải game miễn phí</a></h3>
                        <h3><a href="{{asset('all-games.html')}}" target="_blank" title="Tải game miễn phí">Tải game {{$games->Name}} miễn phí</a></h3>
                        <h3><a href="{{asset('all-games.html')}}" target="_blank" title="Tải game offline">Tải game offline</a></h3>
                        <h3><a href="{{asset('all-games.html')}}" target="_blank" title="Download game offline full crack">Download game offline full crack</a></h3>
                        <h3><a href="{{asset('games-detail/'.$games->TenKhongDau.'/'.$games->id.'.html')}}" target="_blank" title="Tải game {{$games->Name}}">Tải game {{$games->Name}}</a></h3>
                        <h3><a href="{{asset('games-detail/'.$games->TenKhongDau.'/'.$games->id.'.html')}}" target="_blank" title="Download {{$games->Name}}">Download {{$games->Name}}</a></h3>
                        <h3><a href="{{asset('games-detail/'.$games->TenKhongDau.'/'.$games->id.'.html')}}" target="_blank" title="{{$games->Name}} full crack">{{$games->Name}} full crack</a></h3>
                        <h3><a href="{{asset('games-detail/'.$games->TenKhongDau.'/'.$games->id.'.html')}}" target="_blank" title="Download {{$games->Name}} full crack">Download {{$games->Name}} full crack</a></h3>
                        <h3><a href="{{asset('games-detail/'.$games->TenKhongDau.'/'.$games->id.'.html')}}" target="_blank" title="Tải game {{$games->Name}} free">Tải game {{$games->Name}} free</a></h3>
                    </div>
                </div>
                <!-- END: Post Text -->
            </div>
            <!-- END: Post -->
        </div>
        <div class="col-lg-4">
            <!--
                START: Sidebar

                Additional Classes:
                    .nk-sidebar-left
                    .nk-sidebar-right
                    .nk-sidebar-sticky
            -->
            <aside class="nk-sidebar nk-sidebar-right nk-sidebar-sticky">
                <div class="nk-widget">
    <div class="nk-widget-content">
        <form action="{{asset('search')}}" method="get" class="nk-form nk-form-style-1" novalidate="novalidate">
            {{csrf_field()}}
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Type something..." name="Search">
                <button class="nk-btn nk-btn-color-main-1" type="submit"><span class="ion-search"></span></button>
            </div>
        </form>
    </div>
</div>

@if (count($gamescungseries) > 0)
    <div class="nk-widget nk-widget-highlighted">
        <h4 class="nk-widget-title"><span><span class="text-main-1">Game cùng</span> Series</span></h4>
    @foreach ($gamescungseries as $items)
        <div class="nk-widget-content">  
            <div class="nk-widget-post">
                <a href="{{asset('games-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}" class="nk-post-image">
                @if ($items->AnhMini != "")
                    <img src="{{$items->AnhMini}}" alt="{{$items->TenKhongDau}}">
                @else
                    <img src="{{$items->AnhChinh}}" alt="{{$items->TenKhongDau}}">
                @endif
                </a>
                <h2 class="nk-post-title"><a href="{{asset('games-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}">{{$items->Name}}</a></h2>
                <div class="nk-post-date"><span class="fa fa-calendar"></span> {{date('d-m-Y', strtotime($items->created_at))}}</div>
            </div>     
        </div>
    @endforeach
    </div>
@endif
    <div class="nk-widget nk-widget-highlighted">
        <h4 class="nk-widget-title"><span><span class="text-main-1">Game</span> Khác</span></h4>
    @foreach ($gamesrandom as $items)
        <div class="nk-widget-content">  
            <div class="nk-widget-post">
                <a href="{{asset('games-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}" class="nk-post-image">
                @if ($items->AnhMini != "")
                    <img src="{{$items->AnhMini}}" alt="{{$items->TenKhongDau}}">
                @else
                    <img src="{{$items->AnhChinh}}" alt="{{$items->TenKhongDau}}">
                @endif
                </a>
                <h2 class="nk-post-title"><a href="{{asset('games-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}">{{$items->Name}}</a></h2>
                <div class="nk-post-date"><span class="fa fa-calendar"></span> {{date('d-m-Y', strtotime($items->created_at))}}</div>
            </div>     
        </div>
    @endforeach
    </div>
    <div class="nk-widget nk-widget-highlighted">
        <h4 class="nk-widget-title"><span><span class="text-main-1">Game xem</span> nhiều</span></h4>
    @foreach ($gamesxemnhieu as $items)
        <div class="nk-widget-content">  
            <div class="nk-widget-post">
                <a href="{{asset('games-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}" class="nk-post-image">
                @if ($items->AnhMini != "")
                    <img src="{{$items->AnhMini}}" alt="{{$items->TenKhongDau}}">
                @else
                    <img src="{{$items->AnhChinh}}" alt="{{$items->TenKhongDau}}">
                @endif
                </a>
                <h2 class="nk-post-title"><a href="{{asset('games-detail/'.$items->TenKhongDau.'/'.$items->id.'.html')}}">{{$items->Name}}</a></h2>
                <div class="nk-post-date"><span class="fa fa-calendar"></span> {{date('d-m-Y', strtotime($items->created_at))}}</div>
            </div>     
        </div>
    @endforeach
    
    
    </div>
    <!--Quang cao Mgid-------->
    <!-- Admarket - Ad Display Code -->
        <div style="text-align: -webkit-center; margin-top: 30px;">
            <div id="adm-container-2133"></div><script data-cfasync="false" async type="text/javascript" src="//chiasephim.xyz/display/items.php?2133&137&300&250&1&0&0"></script>
        </div>
    <!-- Admarket - Ad Display Code -->
    <!--------End Mgid------------->
<div class="nk-widget nk-widget-highlighted">
    <h4 class="nk-widget-title"><span><span class="text-main-1">We</span> Are Social</span></h4>
    <div class="nk-widget-content">
        <ul class="nk-social-links-3 nk-social-links-cols-4">
            <li><a class="nk-social-twitch" href="{{url()->current()}}"><span class="fab fa-twitch"></span></a></li>
            <li><a class="nk-social-instagram" href="{{url()->current()}}"><span class="fab fa-instagram"></span></a></li>
            <li><a class="nk-social-facebook" href="https://www.facebook.com/taigameoffline/?modal=admin_todo_tour" target="_blank"><span class="fab fa-facebook"></span></a></li>
            <li><a class="nk-social-google-plus" href="https://www.google.com.vn/search?source=hp&ei=ZplGXfmWGMyGoATL1ZeICA&q=daominhha&oq=daominhha&gs_l=psy-ab.3..0i324.69.1361..1577...0.0..0.97.824.10......0....1..gws-wiz.....0..0i131j0j0i10j0i10i30j0i30j38.vYwXQgIbQZQ&ved=0ahUKEwj54cqR6OjjAhVMA4gKHcvqBYEQ4dUDCAU&uact=5" target="_blank"><span class="fab fa-google-plus"></span></a></li>
            <li><a class="nk-social-youtube" href="#https://www.youtube.com/channel/UCXlGbmpc_iv-1UDXMgaC-sQ?view_as=subscriber" target="_blank"><span class="fab fa-youtube"></span></a></li>
            <li><a class="nk-social-twitter" href="{{url()->current()}}" target="_blank"><span class="fab fa-twitter"></span></a></li>
            <li><a class="nk-social-pinterest" href="{{url()->current()}}"><span class="fab fa-pinterest-p"></span></a></li>
            <li><a class="nk-social-rss" href="{{url()->current()}}"><span class="fa fa-rss"></span></a></li>
        </ul>
    </div>
</div>
            </aside>
            <!-- END: Sidebar -->
        </div>
    </div>
</div>

<div class="nk-gap-2"></div>

<script>
    $(document).ready(function(){
        $('.alert').click(function(){
            var id = $(this).attr('attr_id')
            $('.link-re').attr('href','/download/'+ id)

        });
    });
    $(document).ready(function(){
        $('iframe').attr('allowfullscreen',0)
    });
    $(document).ready(function(){
        $('.link-re').click(function(){
            var id = {{$games->id}};
            var token =$("input[name='_token']").val(); 
            $.ajax({
                url:'savelinkgame',
                type:'post',
                dataType: 'json',
                data:{"_token":token,"id":id},
            }).done(function(json) {
                location.reload();
            })
        });	
    });
</script>
<style>
    h3, h5{
        margin-bottom: 1.5rem;
    }
    .tot a{
        margin-bottom: 1.5rem;
        color: rgb(0, 123, 255)!important; 
        margin-right: 10px;
    }
    .tot a:hover{
        color: red !important; 
        cursor: pointer;
    }
    p{
        margin-bottom: 1.5rem;
    }
    .alert {
        padding : 0px !important;
        margin-bottom: 20px;
    }
    .yellow{
        color: yellow;
    }
    .tt{
        margin-bottom: 20px;
    }
</style>
@endsection