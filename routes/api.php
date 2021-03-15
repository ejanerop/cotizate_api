<?php

use \Illuminate\Support\Facades\Route;

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

Route::get('/storage/{folder}/{filename}', 'ApiController@getFile')->name('file');

Route::get('/ip', 'ApiController@getIpAddress');
Route::get('/clients', 'ApiController@clients');
Route::get('/client_by_ip', 'ApiController@clientByIp');
Route::get('/news', 'ApiController@news');
Route::get('/news/{id}', 'ApiController@new');
Route::delete('/new/{id}', 'ApiController@deleteNew')->middleware('auth:api');
Route::delete('/client/{id}', 'ApiController@deleteClient')->middleware('auth:api');
Route::get('/clients/{id}', 'ApiController@client');
Route::post('/payments', 'ApiController@addPayments')->middleware('auth:api');
Route::post('/client', 'ApiController@editClient')->middleware('auth:api');
Route::post('/new', 'ApiController@editNew')->middleware('auth:api');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout');



