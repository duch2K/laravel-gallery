<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageService {
  public function all() {
    $images = DB::table('images')
      ->select('*')
      ->get();
    
    $viewImages = $images->all();

    return $viewImages;
  }

  public function add($image) {
    DB::table('images')->insert(
        ['image' => $image->store('uploads')]
    );
  }

  public function getOne($id) {
    $image = DB::table('images')
      ->select('*')
      ->where('id', $id)
      ->first();

    return $image;
  }

  public function update($id, $newImage) {
    $image = DB::table('images')
      ->select('*')
      ->where('id', $id)
      ->first();
    Storage::delete($image->image);
    
    $fileName = $newImage->store('uploads');
    
    DB::table('images')
      ->where('id', $id)
      ->update(['image' => $fileName]);
  }

  public function delete($id) {
    $image = $this->getOne($id);
    Storage::delete($image->image);

    DB::table('images')
      ->where('id', $id)
      ->delete();
  }
}
