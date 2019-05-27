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
Route::get('/customer/{customer}/verify/{verification_code}',['as' => 'customer.verify' , 'uses' => 'CustomerController@index']);

/*瀏覽菜單*/
Route::get('/menu',['as' => 'menu.index' , 'uses' => 'MenuController@index']);

/*點菜要求(我要這個)*/
Route::post('/order/{id}/item',['as' => 'order.item.store' , 'uses' => 'OrderItemController@store']);

/*查詢點餐明細*/
Route::get('/item',['as' => 'order.item.index' , 'uses' => 'OrderItemController@index']);

/*取消已點選餐點*/
Route::delete('/order/{id}/item/{item}',['as' => 'order.item.destroy' , 'uses' => 'OrderItemController@destroy']);

/*顧客確認點餐*/
Route::patch('/order/{order}/confirm',['as' => 'order.confirm' , 'uses' => 'OrderController@confirm']);
Route::get('/confirm',['as' => 'confirm.index' , 'uses' => 'OrderController@confirm2']);


/*查詢點餐明細Ajax*/
Route::get('/order/{order}/item/test',['as' => 'order.item.index' , 'uses' => 'OrderItemController@index2']);

/*確認結帳*/
Route::get('/order/{order}/checkout',['as' => 'order.checkout' , 'uses' => 'OrderController@checkout']);

/*使用優惠卷*/
Route::post('/MemberCoupons/{id}/use',['as' => 'member.coupon' , 'uses' => 'MemberCouponController@use']);


Route::get('/ajax',['as' => 'ajax' , 'uses' => 'MenuController@ajax']);
Route::get('/ajaxdata',['as' => 'ajaxdata' , 'uses' => 'MenuController@ajaxdata']);

