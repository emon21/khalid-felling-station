<?php

namespace App\Http\Controllers\admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Helpers\CustomMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\OurValueController;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
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
    public function store(Request $request, Service $service)
    {
        //

        $service->service_name = $request->service_name;
        # Image Upload
        if ($request->hasFile('service_picture')) {

            # old image delete

            if (File::exists($service->service_picture)) {
                File::delete($service->service_picture);
            }

            # upload Image
            $image = $request->file('service_picture');
            $image_name = time() . rand(100000, 99999) . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/service/'), $image_name);
            $url = 'uploads/service/' . $image_name;
            $service->service_picture = $url;
        }

        $service->save();
        return redirect()->route('service.index')->with(
            'alert',
            [
                'type' => 'success',
                'title' => 'Service Created',
                'message' => 'Your Service has been created successfully!',
            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {

        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
        // $service = Service::first() ?? new Service();
        // $service->service_name = 'আমার ওয়েবসাইট' ?? 'Default Site Name';
        // $service->service_picture ?? 'https://placehold.co/600x400/EEE/31343C?font=lato&text=Service';
        // $service->save();


        # Update Service 

       
        $service->service_name = $request->service_name;

        if ($request->hasFile('service_picture')) {

            # old image delete

            if (File::exists($service->service_picture)) {
                File::delete($service->service_picture);
            }

            # upload image
            $image = $request->file('service_picture');
            $image_name = time() . rand(100000, 99999) . "." . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/service/'), $image_name);
            $url = 'uploads/service/' . $image_name;
            $service->service_picture = $url;
        }

        // $service->service_picture = $request->service_picture ?? 'https://placehold.co/600x400/EEE/31343C?font=lato&text=Service';

        $service->update();

        return redirect()->route('service.index')->with('alert', [
            'type' => 'success',
            'title' => 'সেবা পরিবর্তন',
            'message' => 'সেবা সফলভাবে পরিবর্তন করা হয়েছে',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {

        # With image delete int Data
        if (File::exists($service->service_picture)) {
            File::delete($service->service_picture);
        }

        $service->delete();
        return redirect()->route('service.index')->with('alert', CustomMessage::error(
            'Delete Service',
            'Your Service has been Deleted successfully!'
        ));
    }
}
