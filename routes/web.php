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

Route::get('/', function () {
    $images = DB::table('images')
        ->select('*')
        ->get();

    $viewImages = $images->all();

    return view('welcome', ['imagesInView' => $viewImages]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/create', function () {
    return view('create');
});

Route::get('/show/{id}', function ($id) {
    $image = DB::table('images')
        ->select('*')
        ->where('id', $id)
        ->first();

    $image = $image->image;

    return view('show', ['imageInView' => $image]);
});

Route::get('/edit/{id}', function ($id) {
    $image = DB::table('images')
        ->select('*')
        ->where('id', $id)
        ->first();

    return view('edit', ['imageInView' => $image]);
});

Route::post('/update/{id}', function (Request $request, $id) {
    
    $image = DB::table('images')
        ->select('*')
        ->where('id', $id)
        ->first();
    Storage::delete($image->image);
    
    $fileName = $request->image->store('uploads');
    
    DB::table('images')
        ->where('id', $id)
        ->update(['image' => $fileName]);

        return redirect('/');
});

Route::post('/store', function (Request $request) {
    // $image = $request->file('image');

    $fileName = $request->image->store('uploads');

    DB::table('images')->insert(
        ['image' => $fileName]
    );

    return redirect('/');
});
