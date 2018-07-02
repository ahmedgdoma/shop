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

Route::get('/', 'HomeController@store');
Route::get('/setstore', 'HomeController@setstore');
Route::get('/product/{id}', 'ProductController@show');
Route::post('addToCart', 'HomeController@addToCart');
Route::get('/checkout', 'HomeController@checkout');
Route::get('/removeFromCart/{id}', 'HomeController@removeFromCart');
Route::get('/emptyCart', 'HomeController@emptyCart');


Route::prefix('admin')->group(function () {
    Auth::routes();
    Route::get('/dummy', function(){
        factory(App\Store::class, 10)->make();
        factory(App\Category::class, 15)->make();
        factory(App\Product::class, 100)->make();
        factory(App\Size::class, 500)->make();
        factory(App\User::class, 10)->make();
    });
    Route::middleware(['auth'])->group(function (){
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('/stores', 'StoreController');
        Route::get('/user/create', 'UserController@create');
        Route::post('/user/store', 'UserController@store');
    });
});


