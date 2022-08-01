<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/dashboard/produk/delete-image', 'ProductsController@delete_image');
Route::get('/dashboard/area-chart', 'PagesController@area_chart');
Route::get('/dashboard/pie-chart', 'PagesController@pie_chart');
Route::post('/search/produk', 'PagesController@search_product');