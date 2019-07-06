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
// 	echo 'test';
//     return view('welcome');
// });

// Route::get('test', function(){
// 	echo 'Route Test';
// });

// //admin group
// Route::group(['prefix' => 'admin'],function(){
// 	Route::get('news', 'NewsController@list')->name('admin.news');//domain/URL không phải route name
// 	Route::get('product', 'ProductController@index');//domain/URL không phải route name
// });

// Route::resource('student', 'StudentController');


Route::group(['namespace' => 'frontend'],function(){
	Route::get('','HomeController@index')->name('frontend.home.index');
	Route::get('product/show/{productId}', 'ProductController@show');
	Route::get('category/show/{id}', 'CategoryController@show');
	Route::get('contact/{slug}', 'ContactController@show');
	Route::get('new/{slug}', 'NewController@show');
	Route::get('cart/list', 'CartController@listCart')->name('cart.list');
	Route::get('cart/add/{productId}', 'CartController@insert')->name('cart.add');
	Route::get('cart/delete/{productId}', 'CartController@delete')->name('cart.delete');
	Route::post('cart/update', 'CartController@update');
	Route::get('checkout/show','CheckoutController@show')->name('checkout.show');
	Route::post('checkout/show','CheckoutController@insert')->name('checkout.show');
});

Route::group(['namespace' => 'backend', 'prefix' => 'admin' , 'middleware' => 'auth'], function(){
	Route::get('/','DashboardController@index') -> name('backend.dashboard.index');
	Route::resource('product', 'ProductController');
	Route::resource('category', 'CategoryController');
	Route::resource('user', 'UserController');
	Route::resource('order', 'OrderController');
	Route::resource('slide', 'SlideController');
	Route::post('user/delete', 'UserController@deleteUserByAjax');
	Route::post('product/delete', 'ProductController@deleteProductByAjax');
	Route::get('user/list/ajax', 'UserController@listUserByAjax');

	// Route::get('user/page', 'UserController@listUserByAjax');
	// Route::resource('user', 'ContactController');
	// Route::resource('user', 'IntroController');
});
Route::get('login','backend\LogInController@getLogin')->name('login');
Route::post('login','backend\LogInController@postLogin');
Route::get('logout','backend\LogInController@postLogout')->name('logout');

