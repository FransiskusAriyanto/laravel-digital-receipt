<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/kuitansi/validasi', 'MainController@validasiscan');
Route::get('/','MainController@index');
Route::get('/kuitansi/request/create','MainController@create');
Route::get('/kuitansi/{kuitansi}','MainController@show');
Route::get('/kuitansi/print/{kuitansi}','MainController@print');
Route::get('/digitalsignature', 'MainController@ds');

Route::post('/kuitansi/kuitansi/request/cipher/store','MainController@cipher');
Route::post('/validasi/scancam', 'MainController@validasi');
Route::post('/kuitansi/request/store','MainController@store');