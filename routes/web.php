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
Route::get('/manage-website', 'WebsiteController@index');
Route::post('/manage-website/storefile/{category}', 'WebsiteController@storeFile');
Route::post('/manage-website/store/{category}', 'WebsiteController@store');
Route::post('/manage-website/youtube', 'WebsiteController@youtube');
Route::post('/manage-website/partner/store', 'PartnerController@store');
Route::delete('/manage-website/partner/delete/{id_partner}', 'PartnerController@destroy');

// Route Board
Route::get('/manage-board', 'BoardController@index');
Route::post('manage-board/structure/{category}', 'BoardController@structure');
Route::post('/manage-board/structure/d/{divisi}', 'BoardController@director');
Route::post('/manage-board/divisi/store', 'BoardController@division');

// Route Publication
Route::get('publication', 'PublicationController@index');
Route::post('/publication/store', 'PublicationController@store');
Route::delete('/publication/destroy/{slug}', 'PublicationController@destroy');

Route::get('merch', 'MerchController@index');
Route::post('merch/store', 'MerchController@store');
Route::delete('merch/destroy/{id}', 'MerchController@destroy');

// Route Event
Route::get('/event', 'EventController@index');
Route::post('/event/store', 'EventController@store');
Route::get('/event/create', 'EventController@create');
