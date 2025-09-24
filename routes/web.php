<?php

use App\Models\ContactUS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\WebsiteController;
use App\Http\Controllers\admin\OurValueController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('website');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

# Contact Route #
Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', function (Request $request) {

    $request->validate([
        'name'    => 'required|string|max:100',
        'email'   => 'required|email',
        'subject' => 'required|string|max:150',
        'message' => 'required|string|min:10',
    ]);

    ContactUS::create($request->only('name', 'email', 'subject', 'message'));
    return back()->with('success', 'Message sent successfully!');

});

# Route Group in Admin #
Route::prefix('admin')->group(function () {
    Route::get('/demo', function () {
        // $flasher->addSuccess('User created successfully!');
        // flash()
        //     ->success('Your product has been created successfully!');

        // flasher()->addSuccess('Data saved successfully!');
        return view('demo');
    });

    # Website Controller #
    Route::get('/website', [WebsiteController::class, 'index'])->name('website.index');
    // Route::post('/website', [WebsiteController::class, 'store'])->name('website.store');

    // Route::get('/website/edit', [WebsiteController::class, 'edit'])->name('website.edit');

    // Route::get('/website-settings', [WebsiteController::class, 'edit'])->name('website-settings.edit');

    //Route::put('/website/update/', [WebsiteController::class, 'update'])->name('website.update');

    //  Route::put('/website/settings', [WebsiteController::class, 'SettingUpdate'])->name('settings.update');


    // Website Settings Routes
    Route::get('/website-settings', [WebsiteController::class, 'edit'])->name('website-settings');
    Route::put('/website-settings', [WebsiteController::class, 'update'])->name('website-settings.update');

    Route::post('/website-settings/reset', [WebsiteController::class, 'reset'])->name('website-settings.reset');
    Route::delete('/website-settings/file', [WebsiteController::class, 'deleteFile'])->name('website-settings.delete-file');



    # page Route #
    Route::resource('page', PageController::class);
    // Route::get('page',[PageController::class,'index']);
    // Route::get('page/create',[PageController::class,'create']);

    # Service Route #
    Route::resource('service', ServiceController::class);
    
    # Our Value Route #
    Route::resource('our-value', OurValueController::class);

    # Slider Route #
    Route::resource('slider', SliderController::class);
    
    # About Route #
    Route::get('about', [AboutController::class,'index'])->name('about');
    Route::put('about', [AboutController::class,'update'])->name('about.update');
    // Route::get('service',[ServiceController::class,'index']);
    Route::get('contact', [WebsiteController::class, 'contact'])->name('contact');
    Route::delete('contact-delete/{contact}', [WebsiteController::class, 'ContactDelete'])->name('contact-delete');
});

route::get('test', function () {
    // Directory আছে কি না check করুন
    if (!is_dir('uploads/website/')) {
        mkdir('uploads/website/', 0755, true);
    }

    // Writable কি না check করুন  
    // if (!is_writable('uploads/website/')) {
    //     throw new \Exception('Directory is not writable');
    // }
});

require __DIR__ . '/auth.php';
