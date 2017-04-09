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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/clients', ['as' => 'clients', 'uses' => 'HomeController@clients']);

Route::get('/editclient/{id}', ['as' => 'editclient', 'uses' => 'HomeController@editClient']);
Route::post('/editclient/{id}', ['as' => 'editclient', 'uses' => 'HomeController@editClient']);


Route::get('/delrecord/{id}', ['as' => 'delrecord', 'uses' => 'HomeController@delRecord']);
Route::post('/delrecord/{id}', ['as' => 'delrecord', 'uses' => 'HomeController@delRecord']);

Route::get('/editrecord', ['as' => 'editrecord', 'uses' => 'HomeController@editRecord']);
Route::post('/editrecord', ['as' => 'editrecord', 'uses' => 'HomeController@editRecord']);

Route::get('/addClient', ['as' => 'addClient', 'uses' => 'HomeController@addNewClient']);
Route::post('/addClient', ['as' => 'addClient', 'uses' => 'HomeController@addNewClient']);




