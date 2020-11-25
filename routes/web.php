<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 
function () {
     return view('welcome');
}
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){

    Route::get('/login','AdminController@login')->middleware('guest:admin')->name('admin_login');
    Route::post('/login','AdminController@check_admin_login')->name('check_admin_login');

    Route::get('/', 'AdminController@index')->middleware('auth:admin')->name('homeAdmin');
    

    }
);

Route::prefix('seller')->group(function(){

    Route::get('/login','SellerController@login')->middleware('guest:seller')->name('seller_login');
    Route::post('/login','SellerController@check_Seller_login')->name('check_seller_login');

    Route::get('/register','SellerController@show_seller_registeration_page')->middleware('guest:seller')
    ->name('show_seller_registeration_page');
    Route::post('/register','SellerController@create_seller')->name('create_seller');

    Route::get('/', 'SellerController@index')->middleware('auth:seller')->name('sellerHome');

    Route::get('/addProduct', 'SellerController@show_add_product_page')->name('show-add-product-page');
    Route::post('/addProduct', 'ProductController@add')->name('add-new-product');
    
    Route::get('/manage-Products' , 'ProductController@show_manage_page')->name('manage_page');
    Route::get('/manage-Products/edit' , 'ProductController@show_edit_page')->name('edit_page');
    Route::delete('/manage-Products/delete/{id}' , 'ProductController@destroy')->name('delete_product');

    }
);

Route::prefix('user')->group(function(){

    Route::get('/page', 'UserController@index')->middleware('auth:web')->name('upage');

    }
);






