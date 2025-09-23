<?php

namespace App\Http\Controllers\admin;

use App\Models\About;
use App\Helpers\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    //

    public function index(){
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request){
        $about = About::first();
        $about->title = $request->about_title;
        $about->short_description = $request->about_description;

        // if($request->hasFile('about_picture')){

        //     FileUpload::deleteImage($about->about_picture);

        //     # upload Image
        //     FileUpload::UploadImage($request->has('about_picture'), 'about');
                 
        // }

        # Image Upload
        if ($request->hasFile('about_picture')) {

            # old image delete

            if(File::exists($about->about_picture)){
                File::delete($about->about_picture);
            }

            # upload Image
            $image = $request->file('about_picture');
            $image_name = time() .rand(100000, 99999)."." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/about/'), $image_name);
            $url = 'uploads/about/' . $image_name;
            $about->about_picture = $url;
            $about->save();

        }

        
        $about->save(); //update()

        return redirect()->route('about')->with('alert', [
            'type' => 'success',
            'title' => 'About Update',
            'message' => 'About Updated Successfully'
        ]);
    }
}
