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














Route::get('/admin/login','admin\LoginController@index');
Route::post('/admin/doLogin','admin\LoginController@doLogin');
Route::get('/admin/logout','admin\LoginController@Logout');
Route::resource('/admin/admin','admin\AdminController')->middleware('App\Http\Middleware\CheckLogin::class');
Route::resource('/admin/cate','admin\CateController');
Route::resource('/admin/article','admin\ArticleController');