<?php

namespace App\Http\Controllers\admin;

use App\Models\Slider;
use App\Helpers\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Slider $slider)
    {

        # Image Upload
        // if ($request->hasFile('slider_picture')) {
        //     # upload Image
        //     $path = FileUpload::UploadImage($request->file('slider_picture'), 'slider');
        //     $slider->slider_picture = $path;
        // }


        # Picture Upload
        if ($request->hasFile('slider_picture')) {

            #old image Delete

            // if (File::exists($our_value->picture)) {
            //     File::delete($our_value->picture);
            // }

            # new image upload
            $image = $request->file('slider_picture');
            $image_name = time() . rand(100000, 99999) . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/slider/'), $image_name);
            $url = 'uploads/slider/' . $image_name;
            // $our_value->picture = $url;
            $slider->slider_picture = $url;
        }

        $slider->status = $request->status;
        $slider->save();
        return redirect()->route('slider.index')->with(
            'alert',
            [
                'type' => 'success',
                'title' => "Create Slider",
                'message' => 'Slider Created Successfully!'
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        # Image Upload
        if ($request->hasFile('slider_picture')) {

            # Old Image Delete
            FileUpload::deleteImage($slider->slider_picture);

            # upload Image
            $path = FileUpload::UploadImage($request->file('slider_picture'), 'slider');
            $slider->slider_picture = $path;
        }

        $slider->status = $request->status;
        $slider->save();

        return redirect()->route('slider.index')->with(
            'alert',
            [
                'type' => 'success',
                'title' => "Update Slider",
                'message' => 'Slider Updated Successfully....'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {

        # Delete Image
        FileUpload::deleteImage($slider->slider_picture);
        $slider->delete();

        return redirect()->route('slider.index')->with(
            'alert',
            [
                'type' => 'error',
                'title' => "Deleted Slider",
                'message' => 'Slider Deleted Successfully!!'
            ]
        );
    }
}
