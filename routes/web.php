<?php

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

//Auth Routes
Route::get('/login', function () {
    return view('login');
})->name('login')->middleware('guest');
Route::post('/login', 'AuthController@store')->name('store.login');
Route::post('logout', 'AuthController@logout')->name('logout');

Route::prefix('/dashboard')->middleware('auth')->group(function (){

    Route::get('/', 'PagesController@dashboard')->name('dashboard');

    Route::resource('produk', 'ProductsController');

    Route::resource('barcode', 'BarcodesController');

    Route::resource('warna', 'ColorsController');

    Route::resource('ukuran', 'SizesController');
});