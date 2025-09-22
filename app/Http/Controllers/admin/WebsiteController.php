<?php

namespace App\Http\Controllers\admin;

use App\Helpers\FileUpload;
use Illuminate\Http\Request;
use App\Helpers\CustomMessage;
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
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //

        $settings = WebsiteSetting::first();
        // return $settings; 
        return view('admin/website-setting', compact('settings'));

        // try {
        //     // Get existing website settings or create default if none exist
        //     $website = WebsiteSetting::first() ?? new WebsiteSetting();

        //     return view('admin/website-setting', compact('website'));
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'Unable to load website settings: ' . $e->getMessage());
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {


        //Settings retrieve/update
        // Always get settings (existing or new)
        $website = WebsiteSetting::first() ?? new WebsiteSetting(); 
        $website->site_name = 'আমার ওয়েবসাইট';
        $website->site_name ?? 'Default Site Name';

        $website->site_email = 'admin@example.com';
        $website->save();

        // Always get settings (existing or new)
        // $settings = WebsiteSetting::first() ?? new WebsiteSetting();
        // echo $settings->site_name ?? 'Default Site Name';


        // Simple way
        // $website = WebsiteSetting::first() ?? new WebsiteSetting();
        
        # Update settings 
        if ($request->has('website')) {

            //     # Site logo Upload
            if ($request->hasFile('site_logo')) {

                // পুরানো Site Logo ডিলিট করো
                if ($website->site_logo && file_exists(public_path($website->site_logo))) {
                    unlink(public_path($website->site_logo));
                }

                // $oldLogo = WebsiteSetting::first()->site_logo ?? null;
                // if ($oldLogo) {
                //     // Storage::delete('public/' . $oldLogo);
                //     // unlink(public_path($website->site_logo));
                //     File::delete(public_path($website->site_logo));
                // }

                // নতুন favicon আপলোড
                $image = $request->file('site_logo');
                // $image_name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/website'), $image_name);

                // ডাটাবেসে পাথ সেভ
                $website->site_logo = 'uploads/website/' . $image_name;
                // $website->site_logo = $image_name;
                $website->save();

            }

            # Site Favicon Upload
            
            if ($request->hasFile('site_favicon')) {

                // Delete old logo if exists
                $oldLogo = WebsiteSetting::first()->site_favicon ?? null;
                if ($oldLogo) {
                    // File::delete('public/' . $oldLogo);
                    File::delete(public_path($oldLogo));
                }

                $image = $request->file('site_favicon');
                $image_name = time() . "_" . date("d_m_y") . "." . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/website/'), $image_name);

                $url = 'uploads/website/' . $image_name;
                $website->site_favicon = $url;
                $website->save();

            }


            # Update settings 
            $website->site_name = $request->site_name;
            $website->site_email = $request->site_email;
            $website->site_phone = $request->site_phone;
            $website->site_address = $request->site_address;
            $website->copy_right = $request->copy_right;
            $website->update();

            return redirect()->route('website-settings')->with('alert', [
                'type' => 'success',
                'title' => 'Website Update',
                'message' => 'Website Setting Updated Successfully'
            ]);
        }


        # Social Info Update
        if ($request->has('social_links')) {

            $website->facebook_url = $request->facebook_url;
            $website->twitter_url = $request->twitter_url;
            $website->instagram_url = $request->instagram_url;
            $website->linkedin_url = $request->linkedin_url;

            $website->update();

            // return redirect()->route('website-settings.edit')->with('alert','Website Setting Updated Successfully','succe');

            return redirect()->route('website-settings')->with('alert', CustomMessage::success(
                'Social Update',
                'Website Setting Updated Successfully'
            ));
        }


        # SEO Info Update
        if ($request->has('seo_settings')) {

            $website->meta_title = $request->meta_title;
            $website->meta_keywords = $request->meta_keywords;
            $website->meta_description = $request->meta_description;

            $website->update();

            // return redirect()->route('website-settings.edit')->with('alert','Website Setting Updated Successfully','succe');

            return redirect()->route('website-settings')->with('alert', CustomMessage::info(
                'Seo Update',
                'SEO information updated successfully!'
            ));
        }
    }

    /**
     * Reset website settings to default values.
     */
    public function reset(Request $request)
    {
        try {
            // 1. Check first setting
            $firstSetting = WebsiteSetting::first();
            if ($firstSetting) {
                echo "First setting before delete:\n";
                // print_r($firstSetting->toArray());
            } else {
                echo "No settings found.\n";
            }
            // 2. Delete all existing settings
            WebsiteSetting::truncate(); // deletes all records and resets auto-increment
            echo "All existing settings deleted.\n";

            # Site Logo Delete on Derectory

            if ($firstSetting->site_logo && file_exists(public_path($firstSetting->site_logo))) {
                unlink(public_path($firstSetting->site_logo));
            }

            # Site Favicon Delete on Derectory

            if ($firstSetting->site_favicon && file_exists(public_path($firstSetting->site_favicon))) {
                unlink(public_path($firstSetting->site_favicon));
            }

            // 3. Call the seeder
            Artisan::call('db:seed', [
                '--class' => 'WebsiteSettingSeeder',
            ]);
            echo "Seeder executed successfully.\n";

            // 4. Check all inserted data
            $allSettings = WebsiteSetting::all();
            echo "All settings after seeding:\n";
            print_r($allSettings->toArray());

            // Run the seeder to reset website settings
            // Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\WebsiteSettingSeeder', '--force' => true]);
            return redirect()->route('website-settings')->with('alert', [
                'type' => 'success',
                'title' => 'Success',
                'message' => 'Website settings have been reset to default values.'
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to reset website settings: ' . $e->getMessage());
            return redirect()->route('website-settings')->with('alert', [
                'type' => 'error',
                'title' => 'Error',
                'message' => 'Failed to reset website settings. Please try again later.'
            ]);
        }
    }


    /**
     * Reset website settings to default values.
     */
    // public function reset(Request $request)
    // {
    //     try {
    //         // 1. Check first setting
    //         $firstSetting = WebsiteSetting::first();
    //         if ($firstSetting) {
    //             echo "First setting before delete:\n";
    //             print_r($firstSetting->toArray());
    //         } else {
    //             echo "No settings found.\n";
    //         }
    //         // 2. Delete all existing settings
    //         WebsiteSetting::truncate(); // deletes all records and resets auto-increment
    //         echo "All existing settings deleted.\n";

    //         // 3. Call the seeder
    //         // Artisan::call('db:seed', [
    //         //     '--class' => 'WebsiteSettingSeeder',
    //         // ]);
    //         echo "Seeder executed successfully.\n";

    //         // 4. Check all inserted data
    //         $allSettings = WebsiteSetting::all();
    //         echo "All settings after seeding:\n";
    //         print_r($allSettings->toArray());

    //         // Run the seeder to reset website settings
    //         Artisan::call('db:seed', ['--class' => 'Database\\Seeders\\WebsiteSettingSeeder', '--force' => true]);
    //         return redirect()->route('website-settings')->with('alert', [
    //             'type' => 'success',
    //             'title' => 'Success',
    //             'message' => 'Website settings have been reset to default values.'
    //         ]);
    //     } catch (\Exception $e) {
    //         Log::error('Failed to reset website settings: ' . $e->getMessage());
    //         return redirect()->route('website-settings')->with('alert', [
    //             'type' => 'error',
    //             'title' => 'Error',
    //             'message' => 'Failed to reset website settings. Please try again later.'
    //         ]);
    //     }
    // }

    /**
     * Delete a specific file associated with website settings.
     */
    public function deleteFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file_type' => 'required|in:site_logo,site_favicon',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('alert', [
                'type' => 'Error',
                'title' => 'Validation Error',
                'message' => $validator->errors()->first()
            ]);
        }
        $website = WebsiteSetting::first();
        $fileType = $request->input('file_type');
        $filePath = $website->$fileType;
        if ($filePath && Storage::exists($filePath)) {
            Storage::delete($filePath);
            $website->$fileType = null;
            $website->save();
            return redirect()->back()->with('alert', [
                'type' => 'Success',
                'title' => 'Success',
                'message' => ucfirst(str_replace('_', ' ', $fileType)) . ' has been deleted successfully.'
            ]);
        } else {
            return redirect()->back()->with('alert', [
                'type' => 'Error',
                'title' => 'Error',
                'message' => 'File not found or already deleted.'
            ]);
        }
    }
}
