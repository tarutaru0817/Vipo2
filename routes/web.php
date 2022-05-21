<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AjaxController;
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


Route::controller(BeerController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/other/index', 'home')->name("form.home");
    Route::post('/other/index', 'AddFav')->name("form.fav");
    Route::get('/other/index_graph', 'graph')->name("form.graph");
    Route::get('/other/mypage', 'mypage')->name("form.mypage");
    Route::get('/other/ranking', 'Ranking');
    Route::get('/login/login', 'LoginView');
    Route::post('/login/login', 'LoginPost');
    Route::get('/login/signin', 'SigninView');
    Route::post('/login/signin', 'SigninPost');
    Route::get('/login/reregist', 'ReregistView');
    Route::post('/login/reregist', 'ReregistPost');
    Route::get('/login/newpass', 'NewpassView');
    Route::post('/login/newpass', 'NewpassPost');

});

Route::controller(PostController::class)->group(function(){
  Route::get('post/post', 'PostView');
  Route::post('post/post', 'PostPost');
  Route::get('post/post_confirm', 'PostconView');
  Route::post('post/post_confirm', 'PostconPost');
  Route::post('post/post_complete', 'PostcompPost');
});

Route::controller(EditController::class)->group(function(){
  Route::get('edit/edit', 'EditGet');
  Route::post('edit/edit', 'EditPost');
  Route::get('edit/edit_confirm', 'EditconGet');
  Route::post('edit/edit_confirm', 'EditconPost');
  Route::get('endit/edit_complete', 'EditcompGet');
  Route::post('edit/edit_complete', 'EditcompPost');
});

Route::controller(UserController::class)->group(function(){
  Route::get('user/user_list', 'UserlistGet');
  Route::get('user/user_check', 'UsercheckGet');
  Route::get('user/unsubscribe', 'UnsubGet');
  Route::post('user/unsubscribe', 'UnsubPost');
  Route::get('user/user_edit', 'UserEditGet');
  Route::post('user/user_edit', 'UserEditPost');
  Route::get('user/user_confirm', 'UserConfGet');
  Route::post('user/user_confirm', 'UserConfPost');
  Route::post('user/user_complete', 'UserCompPost');
});
Route::controller(AjaxController::class)->group(function(){
  Route::post('other/ajax_fav', 'AjaxFav');
  Route::post('other/ajax_nonfav', 'AjaxNonFav');
  Route::post('other/ajax_del', 'AjaxDel');
  Route::post('user/ajax_deluser', 'AjaxDelUser');
});
