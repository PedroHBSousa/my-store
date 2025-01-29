<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/businesses', [BusinessController::class, 'index'])->name('businesses.index');
Route::post('/businesses', [BusinessController::class, 'store'])->name('businesses.store');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('products.index');

//admin
Route::get('/admin/products', [AdminController::class, 'index'])->name('admin.products.index');
Route::get('/admin/products/{product}/edit', [AdminController::class, 'edit'])->name('admin.product.edit');
Route::get('/admin/products/create', [AdminController::class, 'create'])->name('admin.product.create');
Route::post('/admin/products', [AdminController::class, 'store'])->name('admin.product.store');
Route::put('/admin/products/{product}', [AdminController::class, 'update'])->name('admin.product.update');
Route::delete('/admin/products/{product}', [AdminController::class, 'destroy'])->name('admin.product.destroy');
Route::get('/admin/products/{product}/delete-image', [AdminController::class, 'destroyImage'])->name('admin.product.destroyImage');

Route::get('/', function () {
    return view('welcome');
});
