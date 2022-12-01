<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ForgetPasswordController;


// Admin Login & Logout Route
Route::get('/admin-login', [AdminController::class, 'index'])->name('admin.login');
Route::post('/post-login', [AdminController::class, 'login'])->name('post.login');
Route::post('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');

// Forget & Reset Password Route
Route::get('forget-password', [ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::prefix('admin')->middleware(['auth', 'prevent-back-history'])->group(function(){

    // Dashboard
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    // Profile Update
    Route::get('/profile/{id}',[ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update/{id}',[ProfileController::class, 'update'])->name('profile.update');

    // Password Update
    Route::get('/password/{id}',[ProfileController::class, 'passwordIndex'])->name('password');
    Route::post('/password/update/{id}',[ProfileController::class, 'passwordUpdate'])->name('password.update');

});

Route::get('/', function () {
    return view('welcome');
});
