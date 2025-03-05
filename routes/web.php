<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;


//front
Route::prefix('front')->name('front.')->group(function () {
    Route::get('/', HomeController::class)->middleware('auth')->name('index');
});
//admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', DashboardController::class)->middleware(['admin'])->name('index');


##------------------------------------------------------- ADMINS MODULE
    Route::controller(AdminController::class)->group(function () {
        Route::resource('admins', AdminController::class);
    });
##------------------------------------------------------- USERS MODULE
     Route::controller(UserController::class)->group(function () {
        Route::resource('users', UserController::class);
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
