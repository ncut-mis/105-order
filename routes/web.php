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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



/*登入AND驗證(未完成)*/
Route::get('/customer/{customer}/verify',['as' => 'customer.verify' , 'uses' => 'CustomerController@index']);

/*瀏覽菜單*/
Route::get('/menu',['as' => 'menu.index' , 'uses' => 'MenuController@index']);
