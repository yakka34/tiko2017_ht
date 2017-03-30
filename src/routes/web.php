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

//Esim parametreista middlewarelle
//Route::get('/home', 'testi@index')->middleware('App\Http\Middleware\CheckRole:admin');
Route::get('/home', 'HomeController@index');
Route::get('/home/account', 'HomeController@account');
