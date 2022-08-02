<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/', function () {
    return view('welcome');
});



 // for get city list
Route::get('login', function () {
    return view('gigsboard.userLogin');
})->name('login');
Route::get('home', function () {
    return view('gigsboard.home');
});
Route::resource('categorie', StockController::class);
Route::post('/authenticate','App\Http\Controllers\MyuserController@authenticate');
Route::get('/billReciept','App\Http\Controllers\ReceiptController@index');
Route::get('/getPrice/{id}', 'App\Http\Controllers\ReceiptController@getPrice');
Route::post('/insert-user','App\Http\Controllers\PaymentController@store');
Route::get('/index','App\Http\Controllers\MyuserController@index');
Route::post('/insert-user','App\Http\Controllers\MyuserController@store');
Route::get('/logout','App\Http\Controllers\MyuserController@logout');
