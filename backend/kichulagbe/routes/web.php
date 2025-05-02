<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{ProductController,OrderController,CategoryController,ShopController,};
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserController;

use Illuminate\Contracts\Routing\Registrar;

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

  Route::prefix('profile')->group(function () {
    Route::get('{user}/edit', [UserController::class, 'edit'])->name('profile.edit');
    Route::put('update', [UserController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth'])->group(function () {
    // Products and orders routes
    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('orders', OrderController::class)->only(['store', 'index']);
    
  /*     Route::get('/{user}', [UserController::class, 'edit'])->name('profile.edit');
       Route::put('/update', [UserController::class, 'update'])->name('profile.update'); */
  // Route to display the category management form (GET)
/*     Route::get('/categories', [CategoryController::class, 'indexcateg'])->name('    ');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store'); */

 Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
/* 
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');        // List
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create'); // Show form
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');         // Save new
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');  // Show edit form
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('category.update');   // Update
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('category.destroy'); // Delete
  */
});
