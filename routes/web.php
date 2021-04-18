<?php

use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', 'ImagesController@actonIndex');

Route::get('/about', 'ImagesController@actionAbout');

Route::get('/create', 'ImagesController@actionCreate');

Route::get('/show/{id}', 'ImagesController@action');

Route::get('/edit/{id}', 'ImagesController@actionEdit');

Route::post('/update/{id}', 'ImagesController@actionUpdate');

Route::post('/store', 'ImagesController@actionStore');

Route::get('/delete/{id}', 'ImagesController@actionDelete');
