<?php

use Illuminate\Support\Facades\Route;
$url = "App\Http\Controllers";

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
    return view('home');
});

Route::get('table', $url . "\productController@showTable");
Route::get('addproduct', $url . "\productController@add");
Route::post('product/update/{slug}', $url. '\productController@update');
Route::post('product/add', $url. '\productController@simpan');
Route::get('product/edit/{slug}', $url . "\productController@edit");
Route::get('product/{slug}', $url . "\productController@showProduct");
Route::resource('product', $url . '\ProductController');
Route::delete('product/delete/{product:product_slug}', $url. '\productController@delete');
