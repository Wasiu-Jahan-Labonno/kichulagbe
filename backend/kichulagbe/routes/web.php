<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{Controller, HomeController, ProductController, OrderController, CategoryController, ShopController,};
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

/* Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/', [Controller::class, 'welcome'])->name('welcome');
Auth::routes();

// Public Routes
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::get('about', [HomeController::class, 'about'])->name('about');
/*  Route::prefix('profile')->group(function () {
        Route::get('/{user}', [UserController::class, 'edit'])->name('profile.edit');
        Route::put('update', [UserController::class, 'update'])->name('profile.update');
    }); */
// Authenticated Routes
Route::middleware(['auth'])->group(function () {

    // Profile Routes (Grouped under 'profile' prefix)
    Route::prefix('profile')->group(function () {
        Route::get('{user}', [UserController::class, 'edit'])->name('profile.edit');
        Route::put('update', [UserController::class, 'update'])->name('profile.update');
    });
    Route::resource('products', ProductController::class);
    Route::get('/list', [HomeController::class, 'list'])->name('list');

    /*   Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show'); */
    /* // Product Management
    Route::resource('products', ProductController::class)->except(['show']);

    // Orders
    Route::resource('orders', OrderController::class)->only(['store', 'index']); */

    // Category Management (Grouped under 'category' prefix)
    Route::prefix('category')->name('category.')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });
});
