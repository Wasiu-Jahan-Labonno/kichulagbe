<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{ProductController,OrderController,CategoryController,ShopController};
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
// Add this GET route for admin to manage categories


// Keep the existing POST route for storing categories
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');

Route::middleware(['auth'])->group(function () {
    // Products and orders routes
    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('orders', OrderController::class)->only(['store', 'index']);


     // Route to display the category management form (GET)
    Route::get('dashboard/categories', [CategoryController::class, 'index'])->name('dashboard.categories.index');

    // Route to handle storing the category (POST)
    Route::post('dashboard/categories', [CategoryController::class, 'store'])->name('dashboard.categories.store');
});
