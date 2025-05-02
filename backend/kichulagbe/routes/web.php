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

  

Route::middleware(['auth'])->group(function () {
    // Products and orders routes
    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('orders', OrderController::class)->only(['store', 'index']);
    
      Route::get('/{user}', [UserController::class, 'edit'])->name('profile.edit');
       Route::put('/update', [UserController::class, 'update'])->name('profile.update');
  // Route to display the category management form (GET)
   /*  Route::get('/categories', [CategoryController::class, 'indexcateg'])->name('category.indexcateg');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store'); */
Route::resource('categories', CategoryController::class);
 
});
