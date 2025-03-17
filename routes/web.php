<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//front
Route::prefix('front')->name('front.')->group(function () {
    Route::get('/', [PageController::class,'home'])->name('index')->middleware('auth');
    Route::get('/shop', [PageController::class, 'shop'])->name('shop')->middleware('auth');
    Route::get('/about', [PageController::class, 'about'])->name('about')->middleware('auth');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact')->middleware('auth');

    
});
//admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('index')->middleware(['admin']);


##------------------------------------------------------- ADMINS MODULE
    Route::controller(AdminController::class)->group(function () {
        Route::resource('admins', AdminController::class)->middleware(['admin']);
    });
##------------------------------------------------------- USERS MODULE
     Route::controller(UserController::class)->group(function () {
        Route::resource('users', UserController::class)->middleware(['admin']);
    });
    ##------------------------------------------------------- Categorys MODULE
    Route::controller(CategoryController::class)->group(function () {
        Route::resource('categories', CategoryController::class)->middleware(['admin']);
    });
        ##------------------------------------------------------- Brands MODULE

    Route::controller(BrandController::class)->group(function () {
        Route::resource('brands', BrandController::class)->middleware(['admin']);
    });
    ##------------------------------------------------------- Products MODULE
    Route::controller(ProductController::class)->group(function () {
        Route::resource('products', ProductController::class)->middleware(['admin']);
    });


     require __DIR__ . '/adminAuth.php';
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
