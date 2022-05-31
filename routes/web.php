<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::group(['namespace'=>'App\Http\Controllers','middleware'=>'auth'],function () {
    Route::get('/logout', "UserController@logout")->name('user.logout');
    route::resource('products', 'ProductController');
});


Route::group(['namespace'=>'App\Http\Controllers','middleware'=>'guest'],function () {
    Route::get('/users/register', "UserController@create")->name('user.create');
    Route::post('/users/register', "UserController@store")->name('user.register');
    Route::get('/users/login',"UserController@LoginPage")->name('user.login');
    Route::post('/users/login',"UserController@Login")->name('login');
});
