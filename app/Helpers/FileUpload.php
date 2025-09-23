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

   // /**
   //  * Delete entire folder
   //  */
   // public static function DeleteFolder($folder)
   // {
   //    if (File::exists(public_path($folder))) {
   //       File::deleteDirectory(public_path($folder));
   //    }
   // }



   /**
    * Upload an image and return its path
    */
   // public static function UploadImage($file, $folder = 'uploads')
   // {
   //    if ($file) {
   //       // Folder create if not exists
   //       $folderPath = public_path($folder);
   //       if (!File::exists($folderPath)) {
   //          File::makeDirectory($folderPath, 0755, true);
   //       }

   //       $fileName = time() . '.' . $file->getClientOriginalExtension();
   //       $file->move($folderPath, $fileName);

   //       return $folder . '/' . $fileName;
   //    }

   //    return null;
   // }

   // /**
   //  * Delete all files inside a folder (keep folder)
   //  */
   // public static function ClearFolder($folder)
   // {
   //    $folderPath = public_path($folder);

   //    if (File::exists($folderPath)) {
   //       // Delete all files
   //       $files = File::files($folderPath);
   //       foreach ($files as $file) {
   //          File::delete($file);
   //       }

   //       // Delete subfolders
   //       $subFolders = File::directories($folderPath);
   //       foreach ($subFolders as $subFolder) {
   //          File::deleteDirectory($subFolder);
   //       }
   //    }
   // }

}