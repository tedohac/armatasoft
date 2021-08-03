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
})->name('/');

Route::group(['prefix' => 'login', 'middleware' => 'web'], function () {

    Route::get('/login', 'LoginController@form')->name('login');
    Route::post('/login', 'LoginController@process');
    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::group(['prefix' => 'page', 'middleware' => 'web'], function () {

    Route::get('/main', 'MainController@main')->name('main')->middleware('checklogin');
});