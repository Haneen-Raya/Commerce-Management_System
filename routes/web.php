<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\isAdminMiddleware;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'isAdmin'], function () {
    Route::get('/dashboard', function() {return view('dash');});
    //Search route
    Route::get('/search', [ProductController::class, 'search'])->name('products.search');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

Route::resource('orders', OrderController::class);
Route::get('filter', [ProductController::class, 'index'])->name('filter.index');
Route::put('/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
Route::delete('/products/{id}/force-delete', [ProductController::class, 'forceDelete'])->name('products.forceDelete');
Route::get('dash', function () {return view('dash');});



