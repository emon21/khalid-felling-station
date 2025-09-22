<?php
namespace App\Helpers;

use Illuminate\Support\Facades\File;

Class FileUpload{

   # Upload Image
   public static function UploadImage($file, $path){

      $fileName = time() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path('uploads/' . $path . '/'), $fileName);
      // $file->move('uploads/' . $path . '/', $fileName);
      // $path = $image->move('uploads/media/', $originalname);
      return "uploads/$path/" . $fileName;
   }

 
   # Delete Image

   public static function deleteImage($image)
   {
      if (File::exists($image)) {
         File::delete($image);
      }
   }

}