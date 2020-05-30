<footer class="nk-footer">

    <div class="container">
        <div class="nk-gap-3"></div>
        <div class="row vertical-gap">
            <div class="col-md-6">
                <div class="nk-widget">
                    <h4 class="nk-widget-title"><span class="text-main-1">Contact</span> With Us</h4>
                    <div class="nk-widget-content">
                        <form action="php/ajax-contact-form.php" class="nk-form nk-form-ajax">
                            <div class="row vertical-gap sm-gap">
                                <div class="col-md-6">
                                    <input type="email" class="form-control required" name="email" placeholder="Email *">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control required" name="name" placeholder="Name *">
                                </div>
                            </div>
                            <div class="nk-gap"></div>
                            <textarea class="form-control required" name="message" rows="5" placeholder="Message *"></textarea>
                            <div class="nk-gap-1"></div>
                            <button class="nk-btn nk-btn-rounded nk-btn-color-white">
                                <span>Send</span>
                                <span class="icon"><i class="ion-paper-airplane"></i></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="nk-widget">
                    <div class="fan-page" style="float: right; margin-top: 28px;">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FT%E1%BA%A3i-game-mi%E1%BB%85n-ph%C3%AD-daominhhacom-2411438058869720%2F&tabs&width=300&height=200&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=2034531846589677" width="300" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>         
                </div>
            </div>
        </div>
        <div class="nk-gap-3"></div>
    </div>

    <div class="nk-copyright">
        <div class="container">
            <div class="nk-copyright-left">
                Copyright &copy; 2019 <a href="https://themeforest.net/user/_nk?ref=_nK" target="_blank">Đào Minh Hà</a>
            </div>
            <a href="//www.dmca.com/Protection/Status.aspx?ID=72b77a38-4faa-485b-9d88-91581f221658" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/dmca_protected_sml_120l.png?ID=72b77a38-4faa-485b-9d88-91581f221658"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
            <div class="nk-copyright-right">
                <ul class="nk-social-links-2">
                    <li><a class="nk-social-rss" href="{{asset('/')}}" target="_blank"><span class="fa fa-rss"></span></a></li>
                    <li><a class="nk-social-twitch" href="{{asset('/')}}" target="_blank"><span class="fab fa-twitch"></span></a></li>
                    <li><a class="nk-social-steam" href="{{asset('/')}}" target="_blank"><span class="fab fa-steam"></span></a></li>
                    <li><a class="nk-social-facebook" href="https://www.facebook.com/taigameoffline/?modal=admin_todo_tour" target="_blank"><span class="fab fa-facebook"></span></a></li>
                    <li><a class="nk-social-google-plus" href="https://www.google.com/search?ei=VcxGXdfjG9XbhwPWgbL4Ag&q=daominhha&oq=daominhha&gs_l=psy-ab.3..0.2844979.2845990..2846191...0.0..0.176.865.7j2......0....1..gws-wiz.......0i131i67j0i131j0i67j0i10j0i10i30j0i30j38.iKlDvoDG88Q&ved=0ahUKEwiX4ovbmOnjAhXV7WEKHdaADC8Q4dUDCAo&uact=5" target="_blank"><span class="fab fa-google-plus"></span></a></li>
                    <li><a class="nk-social-twitter" href="{{asset('/')}}" target="_blank"><span class="fab fa-twitter"></span></a></li>
                    <li><a class="nk-social-pinterest" href="{{asset('/')}}" target="_blank"><span class="fab fa-pinterest-p"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- END: Footer -->

        
    </div>

    

    
        <!-- START: Page Background -->
@if ($background == 1)
    <img class="nk-page-background-top" src="assets/images/bg-top.png" alt="">
@elseif ($background == 2)
    <img class="nk-page-background-top" src="assets/images/bg-top-2.png" alt="">
@elseif ($background == 3)
    <img class="nk-page-background-top" src="assets/images/bg-top-3.png" alt="">
@elseif ($background == 4)
    <img class="nk-page-background-top" src="assets/images/bg-top-4.png" alt="">
@elseif ($background == 5)
    <img class="nk-page-background-top" src="assets/images/bg-top-5.png" alt="">
@elseif ($background == 6)
    <img class="nk-page-background-top" src="assets/images/bg-top-6.png" alt="">
@else
    <img class="nk-page-background-top" src="assets/images/bg-top-7.png" alt="">
@endif
    <img class="nk-page-background-bottom" src="assets/images/bg-bottom.png" alt="">

<!-- END: Page Background -->  
        <!-- START: Search Modal -->
<div class="nk-modal modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="ion-android-close"></span>
                </button>
                <h4 class="mb-0">Tìm kiếm</h4>
                <div class="nk-gap-1"></div>
                <form action="{{asset('search')}}" method="get" class="nk-form nk-form-style-1">
                    {{csrf_field()}}
                    <input id="thanh-search" type="text" value="" name="Search" class="form-control" placeholder="Nhập game cần tìm" autofocus>
				</form>
				<div id="search-data">
					<!-- <div class="search-info">
						<table class="table-search">				
							<tr>
								<td><a href="" target="_blank"><img src="assets/images/product-5-xs.jpg" width="120px" height="70px"></a></td>
								<td><a class="title-game-search" href="" target="_blank">aaaaaaaa bbb asdas đasad asdasd  asd asd  asd a</a></td>
							</tr>
						</table>
					</div> -->
				</div>
            </div>
        </div>
    </div>
</div>
<!-- END: Search Modal -->
    

    
        <!-- START: Login Modal -->
<!-- END: Login Modal -->

<!-- START: Scripts -->

<!-- Object Fit Polyfill -->
<style>
	.search-info {
		margin-top: 3px;
		padding-bottom: 20px;
		overflow: auto;
		height: 500px;
	}
	.table-search {
		background-color: #fff;
    	width: 100%;
	}
	.table-search tr {
		border-bottom: 2px solid #dd163b;
	}
	.table-search tr td {
		padding: 12px;
	}
	.title-game-search {
		text-decoration: none;
    	color: #7f8b92;
	}
</style>
<script src="assets/vendor/object-fit-images/dist/ofi.min.js"></script>

<!-- GSAP -->
<script src="assets/vendor/gsap/src/minified/TweenMax.min.js"></script>
<script src="assets/vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>

<!-- Popper -->
<script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>

<!-- Bootstrap -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Sticky Kit -->
<script src="assets/vendor/sticky-kit/dist/sticky-kit.min.js"></script>

<!-- Jarallax -->
<script src="assets/vendor/jarallax/dist/jarallax.min.js"></script>
<script src="assets/vendor/jarallax/dist/jarallax-video.min.js"></script>

<!-- imagesLoaded -->
<script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>

<!-- Flickity -->
<script src="assets/vendor/flickity/dist/flickity.pkgd.min.js"></script>

<!-- Photoswipe -->
<script src="assets/vendor/photoswipe/dist/photoswipe.min.js"></script>
<script src="assets/vendor/photoswipe/dist/photoswipe-ui-default.min.js"></script>

<!-- Jquery Validation -->
<script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>

<!-- Jquery Countdown + Moment -->
<script src="assets/vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
<script src="assets/vendor/moment/min/moment.min.js"></script>
<script src="assets/vendor/moment-timezone/builds/moment-timezone-with-data.min.js"></script>

<!-- Hammer.js -->
<script src="assets/vendor/hammerjs/hammer.min.js"></script>

<!-- NanoSroller -->
<script src="assets/vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js"></script>

<!-- SoundManager2 -->
<script src="assets/vendor/soundmanager2/script/soundmanager2-nodebug-jsmin.js"></script>

<!-- Seiyria Bootstrap Slider -->
<script src="assets/vendor/bootstrap-slider/dist/bootstrap-slider.min.js"></script>

<!-- Summernote -->
<script src="assets/vendor/summernote/dist/summernote-bs4.min.js"></script>

<!-- nK Share -->
<script src="assets/plugins/nk-share/nk-share.js"></script>

<!-- GoodGames -->
<script src="assets/js/goodgames.min.js"></script>
<script src="assets/js/goodgames-init.js"></script>
<!-- END: Scripts -->

<script type="text/javascript">
	$(document).ready(function() {
		$('#thanh-search').keyup(function(event) {
			var tukhoa = $(this).val();
			$.ajax({
				url:"{{URL::to("livesearch")}}",
				method:'GET',
				data:{tukhoa:tukhoa},
				dataType:'html',
				success:function(data){
					$('#search-data').html(data);						
				}
			})
		});
	});	
</script>
<!--<div id="fb-root"></div>-->
<!--    <script>(function(d, s, id) {-->
<!--      var js, fjs = d.getElementsByTagName(s)[0];-->
<!--      if (d.getElementById(id)) return;-->
<!--      js = d.createElement(s); js.id = id;-->
<!--      js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';-->
<!--      fjs.parentNode.insertBefore(js, fjs);-->
<!--    }(document, 'script', 'facebook-jssdk'));</script>  -->
<!--    <div class="fb-customerchat" attribution="setup_tool" page_id="376757682777329" theme_color="#fa3c4c" logged_in_greeting="Xin chào! Tôi có thể giúp gì cho bạn ?" logged_out_greeting="Xin chào! Tôi có thể giúp gì cho bạn ?">-->
<!--</div>-->
<!--Infolink Ads-->
</body>
</html>