<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\WebsiteController;

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

    Route::post('/website', [WebsiteController::class, 'store'])->name('website.store');

    Route::get('/website/edit/{id}', [WebsiteController::class, 'edit'])->name('website.edit');
    Route::put('/website/update/{id}', [WebsiteController::class, 'update'])->name('website.update');
    Route::delete('/website/delete/{id}', [WebsiteController::class, 'destroy'])->name('website.destroy');

    # page Route #
    Route::resource('page',PageController::class);
    // Route::get('page',[PageController::class,'index']);
    // Route::get('page/create',[PageController::class,'create']);

    # Service Route
    Route::resource('service',ServiceController::class);
    // Route::get('service',[ServiceController::class,'index']);




});

require __DIR__.'/auth.php';
