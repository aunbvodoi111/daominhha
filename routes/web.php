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

Route::get('/', 'HomeController@getHome');
Route::get('games-detail/{TenKhongDau}/{id}.html', 'HomeController@getGamesDetail');
Route::get('games-theloai/{TenKhongDau}/{idTheLoai}.html', 'HomeController@getGamesTheLoai');
Route::get('all-games.html', 'HomeController@getAllGames');
Route::get('games-xemnhieu.html', 'HomeController@getGamesXemNhieu');
Route::get('games-viethoa.html', 'HomeController@getGamesVietHoa');
Route::get('search', 'HomeController@getSearch');
Route::get('livesearch', 'HomeController@getLiveSearch');

Route::get('admin/login', 'UserController@getLogin');
Route::post('admin/login', 'UserController@postLogin');
Route::get('admin/logout', 'UserController@getLogout');
Route::get('aaaaaaaaa', 'UserController@loginaaa');
Route::get('link/{id}', 'HomeController@link');
Route::post('aaaa', 'UserController@storeCaptchaForm');
Route::post('checkpasslink', 'HomeController@checkPassLink');
Route::post('savelinkgame', 'HomeController@savelinkgame');
Route::get('download/{id}', 'HomeController@download');
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

    Route::group(['prefix' => 'games'], function() {
        Route::get('danhsach', 'GamesController@getDanhSach');
        Route::get('linkmn', 'GamesController@getLinkmn');
        
        
        Route::get('them', 'GamesController@getThem');
        Route::get('tagList', 'GamesController@tagList');
        Route::post('them', 'GamesController@postThem');

        Route::get('sua/{id}', 'GamesController@getSua');
        Route::post('sua/{id}', 'GamesController@postSua');

        Route::get('xoa/{id}', 'GamesController@getXoa');
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

        Route::get('them', 'UserController@getThem');
        Route::post('them', 'UserController@postThem');

        Route::get('sua/{id}', 'UserController@getSua');
        Route::post('sua/{id}', 'UserController@postSua');

        Route::get('xoa/{id}', 'UserController@getXoa');

        Route::get('info', 'UserController@getInfo');
    });

});
