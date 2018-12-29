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

Route::get('/', function () {
    return view('welcome');
});



Route::resource('/admin/user','admin\UserController');
Route::resource('/admin/ting','admin\TingController');










Route::get('/admin/login','admin\LoginController@index');
Route::post('/admin/doLogin','admin\LoginController@doLogin');
Route::get('/admin/logout','admin\LoginController@Logout');
Route::resource('/admin/admin','admin\AdminController')->middleware('App\Http\Middleware\CheckLogin::class');
Route::resource('/admin/cate','admin\CateController')->middleware('App\Http\Middleware\CheckLogin::class');
Route::resource('/admin/article','admin\ArticleController')->middleware('App\Http\Middleware\CheckLogin::class');
Route::resource('/home/article','home\ArticleController');
Route::get('/home/article/cate/{id}','home\ArticleController@showCate');
Route::resource('/home/article/comment','home\ArticleCommentController');
Route::get('/home/login/code','home\LoginController@sendMobileCode');
Route::resource('/home/login','home\LoginController');
Route::post('/home/doLogin','home\LoginController@doLogin');
Route::get('/home/logout','home\LoginController@logout');
