<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller {
    function actionIndex() {
        $images = DB::table('images')
            ->select('*')
            ->get();
    
        $viewImages = $images->all();
    
        return view('welcome', ['imagesInView' => $viewImages]);
    }

    function actionAbout() {
        return view('about');
    }

    function actionCreate () {
        return view('create');
    }

    function actionShow($id) {
        $image = DB::table('images')
            ->select('*')
            ->where('id', $id)
            ->first();
    
        $image = $image->image;
    
        return view('show', ['imageInView' => $image]);
    }

    function actionEdit($id) {
        $image = DB::table('images')
            ->select('*')
            ->where('id', $id)
            ->first();
    
        return view('edit', ['imageInView' => $image]);
    }

    function actionUpdate(Request $request, $id) {
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
    }

    function actionStore(Request $request) {
        $fileName = $request->image->store('uploads');
    
        DB::table('images')->insert(
            ['image' => $fileName]
        );
    
        return redirect('/');
    }

    function actionDelete($id) {
        $image = DB::table('images')
            ->select('*')
            ->where('id', $id)
            ->first();
        Storage::delete($image->image);
    
        DB::table('images')
            ->where('id', $id)
            ->delete();
    
        return redirect('/');
    }
}