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

Route::get('/refrigerators/create', 'RefrigeratorController@create');
Route::post('/refrigerators', 'RefrigeratorController@store');

Route::get('/refrigerators/{refrigerator}','RefrigeratorController@show');

Route::get('/refrigerators/{refrigerator}/foods/create','FoodController@create');
Route::post('/refrigerators/{refrigerator}/foods','FoodController@store');

Route::delete('/refrigerators/{refrigerator}/foods/{food}','FoodController@destroy');

Route::get('/refrigerators/{refrigerator}/foods/fastcreate','FoodController@fastcreate');
Route::post('/refrigerators/{refrigerator}/foods/fastcreate','FoodController@faststore');

Route::get('/refrigerators/{refrigerator}/foods/camera','FoodController@camera');
Route::post('/refrigerators/{refrigerator}/foods/camera','FoodController@camerastore');