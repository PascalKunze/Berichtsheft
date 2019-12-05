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

Route::get('/', function() {return view('welcome');});
//Route::get('/', "IndexController@index");

Route::get('/berichte/byuser/{userID}', 'BerichteController@getByUserId');

Route::get('/azubi/new', "AzubiController@getViewNewAzubi");

Route::get('/azubi/all', "allMitarbeiterController@getViewAllMitarbeiter");

Route::get('/bericht/new', "newBerichtController@getViewNewBericht");

Route::get('/bericht/search', "searchBerichtController@getViewSearchBericht");
