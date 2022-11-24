<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/admin-login', [AdminController::class, 'index'])->name('admin.login');
Route::post('/post-login', [AdminController::class, 'login'])->name('post.login');
Route::post('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')->middleware(['auth'])->group(function(){

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

});

Route::get('/', function () {
    return view('welcome');
});
