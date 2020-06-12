<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/index', 'PostController@store');
Route::post('/posts', 'PostController@store');


Route::get('/', 'HomeController@getHome');
Route::get('games-detail/{TenKhongDau}/{id}.html', 'HomeController@getGamesDetail');
Route::get('games-theloai/{TenKhongDau}/{idTheLoai}.html', 'HomeController@getGamesTheLoai');
Route::get('all-games.html', 'HomeController@getAllGames');
Route::get('games-xemnhieu.html', 'HomeController@getGamesXemNhieu');
Route::get('games-viethoa.html', 'HomeController@getGamesVietHoa');
Route::get('search', 'HomeController@getSearch');
Route::get('livesearch', 'HomeController@getLiveSearch');

Route::get('/anhquy111', function(){
    
    Schema::table('link_lists', function ($table) {
        $table->integer('id_title')->unsigned();
        $table->foreign('id_title')->references('id')->on('title_links')->onDelete('cascade');
    });
});
Route::get('admin/login', 'UserController@getLogin');
Route::post('admin/login', 'UserController@postLogin');
Route::post('admin/loginAdmin', 'UserController@postLoginAdmin');
Route::get('admin/logout', 'UserController@getLogout');
Route::get('login', 'UserController@loginaaa');
Route::get('link/{id}', 'HomeController@link');
Route::post('aaaa', 'UserController@storeCaptchaForm');
Route::post('checkpasslink', 'HomeController@checkPassLink');
Route::post('savelinkgame', 'HomeController@savelinkgame');
Route::get('download/{id}', 'HomeController@download');
Route::get('donate', 'HomeController@donate'); 

Route::get('logout', 'UserController@logout');
Route::post('userCheckF', 'UserController@userCheckF');
Route::get('profile', 'UserController@profile');
Route::post('addcontact', 'UserController@addcontact');
Route::post('changePassword', 'UserController@changePassword')->name('changePassword');
Route::get('password/reset/{token}', 'UserController@reset')->name('password.reset'); 
Route::post('changePasswordFoget/{token}', 'UserController@changePasswordFoget');
Route::get('register/verify/{token}', 'UserController@comfirmEmailRes');
Route::get('ForgotPassword', 'UserController@ForgotPassword');
Route::post('ForgotPassword', 'UserController@postEmailForgotPassword');
Route::post('change_status_user', 'UserController@postChange_status_user');
Route::post('change_status_link', 'GamesController@postChange_status_link');
Route::group(['prefix' => 'admin', 'middleware' => 'adminlogin'], function() {
    //
    Route::group(['prefix' => 'theloai'], function() {
        Route::get('danhsach', 'TheLoaiController@getDanhSach');

        Route::get('them', 'TheLoaiController@getThem');
        Route::post('them', 'TheLoaiController@postThem');

        Route::get('sua/{id}', 'TheLoaiController@getSua');
        Route::post('sua/{id}', 'TheLoaiController@postSua');

        Route::get('xoa/{id}', 'TheLoaiController@getXoa');
    });
    Route::group(['prefix' => 'typelink'], function() {
        Route::get('danhsach', 'TypeLinkController@getDanhSach');

        Route::get('them', 'TypeLinkController@getThem');
        Route::post('them', 'TypeLinkController@postThem');

        Route::get('sua/{id}', 'TypeLinkController@getSua');
        Route::post('sua/{id}', 'TypeLinkController@postSua');

        Route::get('xoa/{id}', 'TypeLinkController@getXoa');
    });

    Route::group(['prefix' => 'tonghop'], function() {
        Route::get('danhsach', 'TongHopController@getDanhSach');
        Route::post('on_off_login', 'TongHopController@on_off_login');
        Route::post('on_off_regis', 'TongHopController@on_off_regis');
        Route::get('them', 'TongHopController@getThem');
        Route::post('them', 'TongHopController@postThem');

        Route::get('sua/{id}', 'TongHopController@getSua');
        Route::post('sua/{id}', 'TongHopController@postSua');

        Route::get('xoa/{id}', 'TongHopController@getXoa');
    });

    Route::group(['prefix' => 'games'], function() {
        Route::get('danhsach', 'GamesController@getDanhSach');
        Route::get('linkmn', 'GamesController@getLinkmn');
        
        Route::get('pagination/fetch_data', 'GamesController@fetch_data');
        Route::get('pagination/search/{id}', 'GamesController@fetch_search');
        Route::get('themdetail/{id}', 'GamesController@getThemDetail');
        Route::post('themdetail/{id}', 'GamesController@postThemDetail');
        Route::get('addlink/{id}', 'GamesController@getAddlink');
        Route::post('addlink/{id}', 'GamesController@postAddlink');

        Route::get('editlink/{id}', 'GamesController@getEditlink');
        Route::post('editlink/{id}', 'GamesController@postEditlink');

        Route::get('them', 'GamesController@getThem');
        Route::get('tagList', 'GamesController@tagList');
        Route::post('them', 'GamesController@postThem');

        Route::get('sua/{id}', 'GamesController@getSua');
        Route::post('sua/{id}', 'GamesController@postSua');

        Route::get('xoa/{id}', 'GamesController@getXoa');
    });

    Route::group(['prefix' => 'contact'], function() {
        Route::get('danhsach', 'ContactController@getDanhSach');
        Route::get('linkmn', 'ContactController@getLinkmn');
        
        
        Route::get('them', 'ContactController@getThem');
        Route::get('tagList', 'ContactController@tagList');
        Route::post('them', 'ContactController@postThem');

        Route::get('sua/{id}', 'ContactController@getSua');
        Route::post('sua/{id}', 'ContactController@postSua');

        Route::get('xoa/{id}', 'ContactController@getXoa');
    });

    Route::group(['prefix' => 'tag'], function() {
        Route::get('edittag/{idGame}', 'TagController@getEditTag');

        Route::get('themtag/{idGame}', 'TagController@getThemTag');
        Route::post('themtag/{idGame}', 'TagController@postThemTag');

        Route::get('xoatag/{id}/{idGame}', 'TagController@getXoaTag');
    });

    Route::group(['prefix' => 'ajax'], function() {
        Route::get('tag/{idTheLoai}', 'AjaxController@getTag');

        Route::get('deletetag/{idTheLoai}', 'AjaxController@getDeleteTag');
    });

    Route::group(['prefix' => 'user'], function() {
        Route::get('danhsach', 'UserController@getDanhSach');

        Route::post('update_fb', 'UserController@update_fb');

        Route::get('ipuser/{id}', 'UserController@ip');
        Route::get('deleteip/{idg}/{id}', 'UserController@deleteip');

        Route::get('them', 'UserController@getThem');
        Route::post('them', 'UserController@postThem');

        Route::get('sua/{id}', 'UserController@getSua');
        Route::post('sua/{id}', 'UserController@postSua');

        Route::get('xoa/{id}', 'UserController@getXoa');

        Route::get('info', 'UserController@getInfo');

        Route::get('pagination/fetch_data', 'UserController@fetch_data');
        Route::get('pagination/search/{id}', 'UserController@fetch_search');
    });

});
