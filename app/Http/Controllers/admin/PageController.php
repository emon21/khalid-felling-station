<?php

namespace App\Http\Controllers\admin;

use App\Models\Pages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\CustomMessage;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $pages = Pages::latest()->simplePaginate(6);
        return view('admin.pages.index', compact('pages'));
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
    public function store(Request $request, Pages $page)
    {
        //
        $page->page_title           = $request->page_title;
        $page->page_name            = $request->page_name;
        $page->slug                 = Str::slug($request->page_name);
        $page->page_description     = $request->page_description;
        $page->save();

       
    //    return redirect()->route('page.index')->with('alert',
    //     [
    //         'type' => 'success',
    //         'title' => 'Product Created',
    //         'message' => 'Your product has been created successfully!',
    //     ]);

    # Message

    $message = [
            'type' => 'success',
            'title' => 'Page Created',
            'message' => 'Your Page has been created successfully!',
        ];

    # Helper Function
    // CustomMessage::success(
    //     'Create Paged',
    //     'Your Page has been created successfully!!'
    // );

    return redirect()->route('page.index')->with('alert', $message);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $page = Pages::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pages $page)
    {
        $page->page_title           = $request->page_title;
        $page->page_name            = $request->page_name;
        $page->slug                 = Str::slug($request->page_name);
        $page->page_description     = $request->page_description;
        $page->save();
    
        return redirect()->route('page.index')->with('alert', CustomMessage::success(
            'Update Page',
            'Your Page has been Updated successfully!'
        ));
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = Pages::findOrFail($id);
        $page->delete();

        return redirect()->route('page.index')->with('alert', CustomMessage::error(
            'Delete Page',
            'Your Page has been Deleted successfully!'
        ));

    }
}
