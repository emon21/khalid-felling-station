<?php

namespace App\Http\Controllers\admin;

use App\Models\OurValue;
use Illuminate\Http\Request;
use App\Helpers\CustomMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class OurValueController extends Controller
{
    
    public function index()
    {
        $our_values = OurValue::all();
        return view('admin.our-value.index', compact('our_values'));
    }

    public function create()
    {
        return view('admin.our-value.create');
    }

    public function store(Request $request, OurValue $our_value)
    {
        // return $request->file_upload;

        $our_value->title = $request->title;
        $our_value->description = $request->description;

        # Picture Upload
        if ($request->hasFile('file_upload')) {
            $image = $request->file('file_upload');
            $image_name = time() . "." . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads/values'), $image_name);
            $url = '/uploads/values/' . $image_name;
            $our_value->picture = $url;           
        } else {
            $our_value->picture = "https://placehold.co/600x400/EEE/31343C?font=lato&text=Please Picture Here";
        }     
        
        
        // $our_value->title ?? "Petrol";

        $our_value->save();

        return redirect()->route('our-value.index')->with('alert', CustomMessage::success(
            'Create',
            'Your Our Value has been Deleted successfully!'
        ));
    }
    public function show(OurValue $our_value)
    {
        return view('admin.our-value.create');
    }
    public function edit(OurValue $our_value)
    {
        return view('admin.our-value.edit',compact('our_value'));
    }
    public function update(Request $request, OurValue $our_value)
    {

        # Picture Upload
        if ($request->hasFile('file_upload')) {

            #old image Delete

            if (File::exists($our_value->picture)) {
                File::delete($our_value->picture);
            }

            # new image upload
            $image = $request->file('file_upload');
            $image_name = time() . rand(100000, 99999) . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/values/'), $image_name);
            $url = 'uploads/values/' . $image_name;
            $our_value->picture = $url;
        }

        $our_value->title = $request->title;
        $our_value->description = $request->description;
        $our_value->save();

        return redirect()->route('our-value.index')->with('alert', CustomMessage::success(
            'Update Value',
            'Your Value has been Deleted successfully!'
        ));
    }
    public function destroy(OurValue $our_value)
    {
        # Delete with Image
        if(File::exists($our_value->picture)){
            File::delete($our_value->picture);
        }

        $our_value->delete();
        return redirect()->route('our-value.index')->with('alert', CustomMessage::error(
            ' Value Delete',
            'Your Value has been Deleted successfully!'
        ));
    }
}
