<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\AdminLoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [AdminLoginController::class, 'showLogin'])->name('admin.showLogin');
Route::post('/', [AdminLoginController::class, 'login'])->name('admin.login');

Route::prefix('admin/user')->group(function() {
    Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('create', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('list', [UserController::class, 'show'])->name('admin.user.show');
    Route::get('delete/{user_id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    Route::get('edit/{user_id}',[UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('edit',[UserController::class, 'update'])->name('admin.user.update');
});
Route::prefix('admin/categories')->group(function() {
    Route::get('create', [CategoriesController::class, 'create'])->name('admin.categories.create');
    Route::post('create', [CategoriesController::class, 'store'])->name('admin.categories.store');
    Route::get('list', [CategoriesController::class, 'show'])->name('admin.categories.show');
    Route::get('delete/{cat_id}', [CategoriesController::class, 'destroy'])->name('admin.categories.destroy');
});
Route::prefix('admin/product')->group(function() {
    Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('create', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('list', [ProductController::class, 'show'])->name('admin.product.show');
    Route::get('delete/{product_id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    Route::get('edit/{product_id}',[ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('edit',[ProductController::class, 'update'])->name('admin.product.update');
});
