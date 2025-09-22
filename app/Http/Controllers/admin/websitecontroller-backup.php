<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      //
      return view('admin/website-setting');
   }



   /**
    * Show the form for editing the specified resource.
    */
   public function edit()
   {
      //

      $settings = WebsiteSetting::first();
      // return $settings; 
      // return view('admin/website-setting',compact('settings'));

      try {
         // Get existing website settings or create default if none exist
         $settings = WebsiteSetting::first() ?? new WebsiteSetting();

         return view('admin/website-setting', compact('settings'));
      } catch (\Exception $e) {
         return redirect()->back()->with('error', 'Unable to load website settings: ' . $e->getMessage());
      }
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request)
   {
      //
      $website = WebsiteSetting::first();
      // Validation rules

      // return $request->website;
      // return $request->all();

      // Get existing settings or create new
      // $settings = WebsiteSetting::first() ?? new WebsiteSetting();


      if ($request->has('website')) {

         // Update other fields
         // $settings->fill([
         //     'site_name' => $request->site_name,
         //     'site_email' => $request->site_email,
         //     'site_phone' => $request->site_phone,
         //     'site_address' => $request->site_address,
         //     'copy_right' => $request->copy_right,
         // ]);

         // $settings->save();



         // Validation rules
         // $request->validate([
         //     'site_name'         => 'required|string|max:255',
         //     'site_email'        => 'required|email|max:255',
         //     'site_phone'        => 'required|string|max:20',
         //     'site_address'      => 'required|string|max:500',
         //     'site_favicon'      => 'nullable|image|mimes:ico,png,jpg,jpeg|max:2048',
         //     'copy_right'        => 'nullable|string|max:255',

         //     'meta_title'        => 'nullable|string|max:255',
         //     'meta_keywords'     => 'nullable|string|max:500',
         //     'meta_description'  => 'nullable|string|max:1000',

         //     'facebook_url'      => 'nullable|url|max:255',
         //     'twitter_url'       => 'nullable|url|max:255',
         //     'instagram_url'     => 'nullable|url|max:255',
         //     'linkedin_url'      => 'nullable|url|max:255',
         // ]);

         // Handle file uploads
         // if ($request->hasFile('site_logo')) {
         //     // $url = $website->site_logo;
         //     // if ($url && Storage::disk('public')->exists($url)) {
         //     //     Storage::disk('public')->delete($url);
         //     // }

         //     // old iamge delete
         //     // $imagePath = public_path($url);
         //     // if (file_exists($imagePath)) {
         //     //     unlink($imagePath); // Delete the file
         //     // }

         //     // if($url){
         //     //     $imagePath = public_path($url);
         //     //     if (file_exists($imagePath)) {
         //     //         unlink($imagePath); // Delete the file
         //     //     }

         //     // }

         //     # upload image

         //     // 
         //     $image = $request->file('site_logo');
         //     $extention = $image->getclientOrignalName(); // get file extention , getClientOriginalExtension() get the original file extention ,getclientOrignalName() get the original file name

         //     $logoName = 'logo_' . time() . '.' . $extention;  
         //     $logoPath = $image->move('uploads', $logoName); // move the file to the public/uploads folder
         //     // $logoPath = $request->file('site_logo')->store('uploads', 'public');
         //     // $logoPath = $request->file('site_logo')->storeAs('uploads', $logoName, 'public'); // storeAs() store the file with the original name

         //     // $logoPath = $request->file('site_logo')->store('uploads', 'public');


         //     $logoPath = $request->file('site_logo')->move('uploads');
         //     $website->site_logo = $logoPath;

         // }

         // if ($request->hasFile('site_favicon')) {
         //     $faviconPath = $request->file('site_favicon')->store('uploads', 'public');
         //     $website->site_favicon = $faviconPath;
         // }


         # image upload
         // Delete old logo if exists
         if ($website && File::exists(public_path('uploads/' . $website->value))) {
            File::delete(public_path('uploads/' . $website->value));
         }

         // Upload new logo
         if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            // $path =  'uploads/' . $filename;

            // Update or create setting
            // WebsiteSetting::updateOrCreate(
            //     ['key' => 'site_logo'],
            //     ['value' => $filename]
            // );

            $website->site_logo = $filename;
         }

         // Update settings
         $website->site_name         = $request->site_name;
         // $website->site_logo         = $request->site_logo;

         $website->site_email        = $request->site_email;
         $website->site_phone        = $request->site_phone;
         $website->site_address      = $request->site_address;
         // $website->site_favicon      = $request->site_favicon;
         $website->copy_right        = $request->copy_right;

         // // page seo
         // $website->meta_title        = $request->meta_title;
         // $website->meta_keywords     = $request->meta_keywords;
         // $website->meta_description  = $request->meta_description;
         // // social media
         // $website->facebook_url      = $request->facebook_url;
         // $website->twitter_url       = $request->twitter_url;
         // $website->instagram_url     = $request->instagram_url;
         // $website->linkedin_url      = $request->linkedin_url;

         $website->update();
         // return redirect()->route('website-settings.edit')->with('alert','Website Setting Updated Successfully','succe');

         return redirect()->back()->with('success', 'Website information updated successfully!');
      }

      # Social Info Update

      if ($request->has('social')) {

         $website->facebook_url      = $request->facebook_url;
         $website->twitter_url       = $request->twitter_url;
         $website->instagram_url     = $request->instagram_url;
         $website->linkedin_url      = $request->linkedin_url;

         $website->update();

         // return redirect()->route('website-settings.edit')->with('alert','Website Setting Updated Successfully','succe');

         return redirect()->back()->with('success', 'Social information updated successfully!');
      }


      # SEO Info Update
      if ($request->has('seo')) {

         $website->meta_title        = $request->meta_title;
         $website->meta_keywords     = $request->meta_keywords;
         $website->meta_description  = $request->meta_description;

         $website->update();

         // return redirect()->route('website-settings.edit')->with('alert','Website Setting Updated Successfully','succe');

         return redirect()->back()->with('success', 'SEO information updated successfully!');
      }

      # Basic Info Update
      if ($request->has('basic')) {
         $website->site_name         = $request->site_name;
         // $website->site_logo         = $request->site_logo;
         $website->site_email        = $request->site_email;
         $website->site_phone        = $request->site_phone;
         $website->site_address      = $request->site_address;
         // $website->site_favicon      = $request->site_favicon;
         $website->copy_right        = $request->copy_right;

         $website->update();

         // return redirect()->route('website-settings.edit')->with('alert','Website Setting Updated Successfully','succe');

         return redirect()->back()->with('success', 'Basic information updated successfully!');
      }

      # website Logo Update
      if ($request->hasFile('site_logo')) {
         $logoPath = $request->file('site_logo')->store('uploads', 'public');
         $website->site_logo = $logoPath;
      }
      $website->update();
      return redirect()->back()->with('success', 'Website logo updated successfully!');

      # website Favicon Update
      if ($request->hasFile('site_favicon')) {
         $faviconPath = $request->file('site_favicon')->store('uploads', 'public');
         $website->site_favicon = $faviconPath;
      }
      $website->update();
      return redirect()->back()->with('success', 'Website favicon updated successfully!');
      // return redirect()->route('website.edit')->with('alert','Website Setting Updated Successfully');







      // // $website = WebsiteSetting::find($id);
      // $website->site_name         = $request->site_name;
      // // $website->site_logo         = $request->site_logo;
      // $website->site_email        = $request->site_email;
      // $website->site_phone        = $request->site_phone;
      // $website->site_address      = $request->site_address;
      // $website->site_favicon      = $request->site_favicon;
      // $website->copy_right        = $request->copy_right;

      // // page seo
      // $website->meta_title        = $request->meta_title;
      // $website->meta_keywords     = $request->meta_keywords;
      // $website->meta_description  = $request->meta_description;

      // // social media
      // $website->facebook_url      = $request->facebook_url;
      // $website->twitter_url       = $request->twitter_url;
      // $website->instagram_url     = $request->instagram_url;
      // $website->linkedin_url      = $request->linkedin_url;

      // $website->update();

      // return redirect()->route('website.edit')->with('alert','Website Setting Updated Successfully');
   }


   /**
    * Reset settings to default (optional method)
    */
   //     public function reset()
   //     {
   // //         $deletedKeys = websiteSetting::whereIn('key', $websiteSetting)->pluck('key')->toArray();
   // // Log::info('Deleted settings keys: ' . implode(', ', $deletedKeys));
   // // websiteSetting::whereIn('key', $websiteSetting)->delete();

   // // $settings = WebsiteSetting::pluck('key')->toArray();
   // // WebsiteSetting::whereIn('key', $settings)->delete();

   //         // try {
   //         //     // Define the keys to be deleted
   //         //     $websiteSettings = ['site_name', 'site_phone', 'site_email', 'site_address', 'site_logo', 'site_favicon', 'copy_right'];

   //         //     // Delete existing website settings
   //         //     WebsiteSetting::whereIn('key', $websiteSettings)->delete();

   //         //     // Call the WebsiteSettingsSeeder to restore default values
   //         //     Artisan::call('db:seed', [
   //         //         '--class' => 'WebsiteSettingSeeder',
   //         //         '--force' => true,
   //         //     ]);

   //         //     return redirect()->back()->with('success', 'Website settings reset to default successfully.');
   //         // } catch (\Exception $e) {
   //         //     Log::error('Error resetting website settings: ' . $e->getMessage());
   //         //     return redirect()->back()->with('error', 'Failed to reset website settings. Please try again.');
   //         // }

   //         // try {
   //         //     // $settings = WebsiteSetting::first();
   //         //     // if ($settings) {
   //         //     //         // Reset to default values
   //         //     //         $settings->update([
   //         //     //             'site_name' => null,
   //         //     //             'site_email' => null,
   //         //     //             'site_phone' => null,
   //         //     //             'site_address' => null,
   //         //     //             'copy_right' => null,
   //         //     //             'site_logo' => null,
   //         //     //             'site_favicon' => null,
   //         //     //             'facebook_url' => null,
   //         //     //             'twitter_url' => null,
   //         //     //             'instagram_url' => null,
   //         //     //             'linkedin_url' => null,
   //         //     //             'youtube_url' => null,
   //         //     //             'tiktok_url' => null,
   //         //     //             'meta_title' => null,
   //         //     //             'meta_description' => null,
   //         //     //             'meta_keywords' => null,
   //         //     //         ]);

   //         //     //     }


   //         //     // Delete existing website settings
   //         //     // $websiteSettings = ['site_name', 'site_phone', 'site_email', 'site_address', 'copy_right'];

   //         //     $settings = WebsiteSetting::first();

   //         //     $websiteSettings = ['site_name','site_phone','site_email','site_address','copy_right', 'meta_title','meta_keywords','meta_description'];

   //         //     // return $settings;

   //         //     WebsiteSetting::whereIn('key', $settings)->delete();


   //         //     // Call the WebsiteSettingsSeeder
   //         //     Artisan::call('db:seed', [
   //         //         '--class' => 'WebsiteSettingSeeder',
   //         //         '--force' => true, // Force run in production
   //         //     ]);

   //         //     return redirect()->back()->with('success', 'Website settings reset to default successfully.');
   //         // } catch (\Exception $e) {
   //         //     Log::error('Error resetting website settings: ' . $e->getMessage());
   //         //     return redirect()->back()->with('error', 'Failed to reset website settings. Please try again.');
   //         // }

   //         // try {
   //         //     $settings = WebsiteSetting::first();

   //         //     if ($settings) {
   //         //         // Delete uploaded files
   //         //         if ($settings->site_logo && Storage::disk('public')->exists($settings->site_logo)) {
   //         //             Storage::disk('public')->delete($settings->site_logo);
   //         //         }

   //         //         if ($settings->site_favicon && Storage::disk('public')->exists($settings->site_favicon)) {
   //         //             Storage::disk('public')->delete($settings->site_favicon);
   //         //         }

   //         //         // Reset to default values
   //         //         $settings->update([
   //         //             'site_name' => 'Your Website',
   //         //             'site_email' => 'admin@example.com',
   //         //             'site_phone' => null,
   //         //             'site_address' => null,
   //         //             'copy_right' => '© 2024 Your Company. All rights reserved.',
   //         //             'site_logo' => null,
   //         //             'site_favicon' => null,
   //         //             'facebook_url' => null,
   //         //             'twitter_url' => null,
   //         //             'instagram_url' => null,
   //         //             'linkedin_url' => null,
   //         //             'youtube_url' => null,
   //         //             'tiktok_url' => null,
   //         //             'meta_title' => 'Your Website - Welcome',
   //         //             'meta_description' => 'Welcome to our website. Discover our services and products.',
   //         //             'meta_keywords' => 'website, services, products',
   //         //         ]);
   //         //     }

   //         //     return redirect()->back()->with('success', 'Website settings reset to default values.');
   //         // } catch (\Exception $e) {
   //         //     return redirect()->back()->with('error', 'Failed to reset settings: ' . $e->getMessage());
   //         // }
   //     }


   public function reset()
   {

      // try {
      //     // Get all keys from the database
      //     $settings = WebsiteSetting::pluck('key')->toArray();

      //     // Delete any existing logo file
      //     $logoSetting = WebsiteSetting::where('key', 'site_logo')->first();
      //     if ($logoSetting && $logoSetting->value && Storage::disk('public')->exists($logoSetting->value)) {
      //         Storage::disk('public')->delete($logoSetting->value);
      //     }

      //     // Delete all settings
      //     WebsiteSetting::whereIn('key', $settings)->delete();

      //     // Call the WebsiteSettingsSeeder to restore default values
      //     Artisan::call('db:seed', [
      //         '--class' => 'WebsiteSettingsSeeder',
      //         '--force' => true,
      //     ]);

      //     return redirect()->back()->with('success', 'All settings reset to default successfully.');
      // } catch (\Exception $e) {
      //     Log::error('Error resetting settings: ' . $e->getMessage());
      //     return redirect()->back()->with('error', 'Failed to reset settings. Please try again.');
      // }



      // try {
      //     // Get the first (and only) settings record
      //     $settings = WebsiteSetting::first();




      //     if ($settings) {
      //         // Delete uploaded files
      //         // if ($settings->site_logo && Storage::disk('public')->exists($settings->site_logo)) {
      //         //     Storage::disk('public')->delete($settings->site_logo);
      //         // }

      //         // if ($settings->site_favicon && Storage::disk('public')->exists($settings->site_favicon)) {
      //         //     Storage::disk('public')->delete($settings->site_favicon);
      //         // }

      //         // Delete all settings
      //         // WebsiteSetting::whereIn('key', $settings)->delete();

      //         // $deletedKeys = websiteSetting::whereIn('key', $settings)->pluck('key')->toArray();
      //         // Log::info('Deleted settings keys: ' . implode(', ', $deletedKeys));
      //         // websiteSetting::whereIn('key', $settings)->delete();

      //         // $settings = WebsiteSetting::pluck('key')->toArray();
      //         // WebsiteSetting::whereIn('key', $settings)->delete();

      //        // $websiteSettings = ['site_name', 'site_phone', 'site_email', 'site_address', 'site_logo', 'site_favicon', 'copy_right'];

      //         // $websiteSettings = [
      //         //     'site_name',
      //         //     'site_phone',
      //         //     'site_email',
      //         //     'site_address',
      //         //     'copy_right',
      //         // ];

      //         // return $websiteSettings;
      //         //         //     // Delete existing website settings
      //         // WebsiteSetting::whereIn('websiteSettings', $websiteSettings)->delete();



      //         // Reset to default values
      //         // $settings->update([
      //         //     'site_name' => null,
      //         //     'site_logo' => null,
      //         //     'site_email' => null,
      //         //     'site_phone' => null,
      //         //     'site_address' => null,
      //         //     'site_favicon' => null,
      //         //     'copy_right' => null,
      //         //     'meta_title' => null,
      //         //     'meta_description' => null,
      //         //     'meta_keywords' => null,
      //         //     'facebook_url' => null,
      //         //     'twitter_url' => null,
      //         //     'instagram_url' => null,
      //         //     'linkedin_url' => null,
      //         // ]);

      //         // Call the WebsiteSettingsSeeder to restore default values
      //         Artisan::call('db:seed', [
      //             '--class' => 'Database\\Seeders\\WebsiteSettingSeeder',
      //             '--force' => true,
      //         ]);
      //     }
      //     return redirect()->back()->with('success', 'Website settings reset to default values.');
      // } catch (\Exception $e) {
      //     return redirect()->back()->with('error', 'Failed to reset settings: ' . $e->getMessage());
      // }

      // $settings = WebsiteSetting::first();

      // return $settings;
      // $websiteSettings = ['site_name', 'site_phone', 'site_email', 'site_address', 'site_logo', 'site_favicon', 'copy_right'];

      // WebsiteSetting::whereIn('websiteSettings', $websiteSettings)->delete();


      // 1. Check first setting
      $firstSetting = WebsiteSetting::first();
      if ($firstSetting) {
         echo "First setting before delete:\n";
         print_r($firstSetting->toArray());
      } else {
         echo "No settings found.\n";
      }

      // 2. Delete all existing settings
      WebsiteSetting::truncate(); // deletes all records and resets auto-increment
      echo "All existing settings deleted.\n";

      // 3. Call the seeder
      Artisan::call('db:seed', [
         '--class' => 'WebsiteSettingSeeder',
      ]);
      echo "Seeder executed successfully.\n";

      // 4. Check all inserted data
      $allSettings = WebsiteSetting::all();
      echo "All settings after seeding:\n";
      print_r($allSettings->toArray());


      // Artisan::call('db:seed', [
      //     '--class' => 'Database\\Seeders\\WebsiteSettingSeeder',
      //     '--force' => true,
      // ]);

      return redirect()->back()->with('alert', [
         'title' => 'Success',
         'type' => 'success',
         'message' => 'Website settings reset to default values.',
      ]);
   }

   /**
    * Delete specific uploaded file
    */
   public function deleteFile(Request $request)
   {
      $validator = Validator::make($request->all(), [
         'file_type' => 'required|in:logo,favicon',
      ]);

      if ($validator->fails()) {
         return response()->json([
            'success' => false,
            'message' => 'Invalid file type specified.'
         ], 400);
      }

      try {
         $settings = WebsiteSetting::first();

         if (!$settings) {
            return response()->json([
               'success' => false,
               'message' => 'Website settings not found.'
            ], 404);
         }

         $fileType = $request->file_type;
         $fieldName = 'site_' . $fileType;

         if ($settings->$fieldName && Storage::disk('public')->exists($settings->$fieldName)) {
            Storage::disk('public')->delete($settings->$fieldName);
            $settings->$fieldName = null;
            $settings->save();

            return response()->json([
               'success' => true,
               'message' => ucfirst($fileType) . ' deleted successfully.'
            ]);
         }

         return response()->json([
            'success' => false,
            'message' => ucfirst($fileType) . ' not found.'
         ], 404);
      } catch (\Exception $e) {
         return response()->json([
            'success' => false,
            'message' => 'Failed to delete file: ' . $e->getMessage()
         ], 500);
      }
   }
}
