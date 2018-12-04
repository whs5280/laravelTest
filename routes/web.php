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

//

Route::get('/info','InfoController@index');
Route::get('/info/detail/{id}','InfoController@detail');
Route::get('/info/detele/{id}','InfoController@detele');
Route::get('/info/editor/{id}','InfoController@editor');


