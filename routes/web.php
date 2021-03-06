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

Route::get('/', 'PagesController@index');


Route::resource('songs', 'SongsController');
Route::resource('persons', 'PersonsController');

Route::get('arrangements/create/{id}', [
    'as' => 'arrangements.create',
    'uses' => 'ArrangementsController@create'
]);

Route::resource('arrangements', 'ArrangementsController', ['except' => 'create']);
Route::resource('files', 'FilesController');