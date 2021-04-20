<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;

class ImagesController extends Controller {
    private $imageService;

    public function __construct(ImageService $imageService) {
        $this->imageService = $imageService;
    }

    function actionIndex() {
        $images = $this->imageService->all();
    
        return view('welcome', ['imagesInView' => $images]);
    }

    function actionCreate () {
        return view('create');
    }

    function actionShow($id) {
        $image = $this->imageService->getOne($id);
    
        return view('show', ['imageInView' => $image->image]);
    }

    function actionEdit($id) {
        $image = $this->imageService->getOne($id);
    
        return view('edit', ['imageInView' => $image]);
    }

    function actionUpdate(Request $request, $id) {
        $image = $request->image;
        $this->imageService->update($id, $image);
    
        return redirect('/');
    }

    function actionStore(Request $request) {
        $image = $request->file('image');
        $this->imageService->add($image);
    
        return redirect('/');
    }

    function actionDelete($id) {
        $this->imageService->delete($id);
    
        return redirect('/');
    }
}