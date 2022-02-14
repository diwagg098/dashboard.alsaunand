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

Route::get('/', 'HomeController@index');
Route::get('/board', 'BoardController@index');
Route::get('/publication', 'PublicationController@index');
Route::get('/event', 'EventController@index');
Route::get('/alumni', 'AlumniController@index');
Route::get('/merch', 'MerchController@index');
