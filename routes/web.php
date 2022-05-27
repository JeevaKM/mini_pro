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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index','App\Http\Controllers\MyuserController@index');
Route::post('/insert-user','App\Http\Controllers\MyuserController@store');

Route::get('/update-user/{id}','App\Http\Controllers\MyuserController@edit');
Route::post('/updated-user','App\Http\Controllers\MyuserController@update');
Route::get('/user-delete/{id}','App\Http\Controllers\MyuserController@destroy');