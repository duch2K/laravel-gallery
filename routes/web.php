<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [ImagesController::class, 'actionIndex']);

Route::get('/about', [HomeController::class, 'actionAbout']);

Route::get('/create', [ImagesController::class, 'actionCreate']);

Route::get('/show/{id}', [ImagesController::class, 'actionShow']);

Route::get('/edit/{id}', [ImagesController::class, 'actionEdit']);

Route::post('/update/{id}', [ImagesController::class, 'actionUpdate']);

Route::post('/store', [ImagesController::class, 'actionStore']);

Route::get('/delete/{id}', [ImagesController::class, 'actionDelete']);
