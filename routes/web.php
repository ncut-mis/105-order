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

/*點菜要求(我要這個)*/
Route::post('/order/{id}/item',['as' => 'order.item.store' , 'uses' => 'OrderItemController@store']);

/*查詢點餐明細*/
Route::get('/order/{id}/item',['as' => 'order.item.index' , 'uses' => 'OrderItemController@index']);

/*取消已點選餐點*/
Route::delete('/order/{id}/item/{item}',['as' => 'order.item.destroy' , 'uses' => 'OrderItemController@destroy']);

/*顧客確認點餐*/
Route::patch('/order/{id}/confirm',['as' => 'order.confirm' , 'uses' => 'OrderItemController@confirm']);
