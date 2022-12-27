<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ForgetPasswordController;
use App\Http\Controllers\Admin\SendingGmailController;
use App\Http\Controllers\Admin\MultiImageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubSubCategoryController;
use App\Http\Controllers\Admin\MultiDependentExample;
use App\Http\Controllers\Admin\YajraDataTableController;
use App\Http\Controllers\Admin\ExportController;


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

    // Sending Gmail
    Route::get('/email', [SendingGmailController::class, 'index'])->name('send.gmail');
    Route::post('/email/store', [SendingGmailController::class, 'store'])->name('store.gmail');

    Route::prefix('/multi-dependent-selectbox')->group(function(){
        // Category
        Route::get('/categories', [CategoryController::class, 'index'])->name('all.category');
        Route::post('/categories/store', [CategoryController::class, 'store'])->name('store.category');

        // Sub Category
        Route::get('/sub-categories', [SubCategoryController::class, 'index'])->name('all.subcategory');
        Route::post('/sub-categories/store', [SubCategoryController::class, 'store'])->name('store.subcategory');

        // Sub SubCategory
        Route::get('/sub-sub-categories', [SubSubCategoryController::class, 'index'])->name('all.sub.subcategory');
        Route::post('/sub-sub-categories/store', [SubSubCategoryController::class, 'store'])->name('store.sub.subcategory');
        Route::get('/subcategory-by-category/{category_id}', [SubSubCategoryController::class, 'subcategoryFetch'])->name('subcategory.fetch');

        // Sub SubCategory
        Route::get('/example', [MultiDependentExample::class, 'index'])->name('all.selectbox');
        Route::post('/example/store', [MultiDependentExample::class, 'store'])->name('store.selectbox');
        Route::get('/example/edit/{id}', [MultiDependentExample::class, 'edit'])->name('edit.selectbox');
        Route::post('/example/update/{id}', [MultiDependentExample::class, 'update'])->name('update.selectbox');
        Route::get('/example/delete/{id}', [MultiDependentExample::class, 'destroy'])->name('destroy.selectbox');
        Route::get('/sub-subcategory-fetch/{subcategory_id}', [MultiDependentExample::class, 'subSubcategoryFetch'])->name('sub.subcategory.fetch');
    });

    // YAJRA DATATABLE -- [WITHOUT BUTTON]
    Route::get('/yajra', [YajraDataTableController::class, 'index'])->name('yajra.datatable');
    Route::post('/yajra/store', [YajraDataTableController::class, 'store'])->name('store.yajra');
    Route::get('/yajra/edit/{id}', [YajraDataTableController::class, 'edit'])->name('edit.yajra');
    Route::post('/yajra/update/{id}', [YajraDataTableController::class, 'update'])->name('update.yajra');
    Route::get('/yajra/destroy/{id}', [YajraDataTableController::class, 'destroy'])->name('destroy.yajra');
    Route::post('/yajra/destroy-confirm/{id}', [YajraDataTableController::class, 'destroyConfirm'])->name('destroy.confirm');


    Route::get('/yajra/button', [ExportController::class, 'index'])->name('yajra.datatable.button');



    // MULTI IMAGE UPLOAD CRUD
    Route::get('/multiple/image', [MultiImageController::class, 'index'])->name('all.multi');


});

Route::get('/', function () {
//    return view('admin.send-gmail.body');
    return view('welcome');
});
