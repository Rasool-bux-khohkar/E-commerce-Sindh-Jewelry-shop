<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();

// Route::get('/', [App\Http\Controllers\CategoriesController::class, 'index']);

Route::get('/', [App\Http\Controllers\user\UserController::class, 'home']);
Route::get('/products', [App\Http\Controllers\user\UserController::class, 'products'])->name('products');
Route::get('/product-detail', [App\Http\Controllers\user\UserController::class, 'product_detail'])->name('product-detail');
Route::get('/cart', [App\Http\Controllers\user\UserController::class, 'cart']);
Route::get('/add-to-cart/{id}', [App\Http\Controllers\user\UserController::class, 'addToCart'])->name('add-to-cart');
Route::patch('/update-cart', [App\Http\Controllers\user\UserController::class, 'update'])->name('update.cart');
Route::delete('/remove-from-cart', [App\Http\Controllers\user\UserController::class, 'remove'])->name('remove.from.cart');
Route::get('/checkout', [App\Http\Controllers\user\UserController::class, 'checkout']);

Route::get('/ordered', [App\Http\Controllers\admin\OrderController::class, 'store']);

Route::get('admin-dashboard', [App\Http\Controllers\admin\DashboardController::class, 'index']);
Route::get('view-user', [App\Http\Controllers\admin\UserController::class, 'index']);
Route::get('changeStatus', [App\Http\Controllers\admin\UserController::class, 'update']);

Route::get('add-subcategory', [App\Http\Controllers\admin\CategorySubcategoryController::class, 'create']);
Route::post('add-subcategory-process', [App\Http\Controllers\admin\CategorySubcategoryController::class, 'store']);

Route::get('sub-category', [App\Http\Controllers\admin\CategorySubcategoryController::class, 'index']);

Route::get('add-category', [App\Http\Controllers\admin\CategoryController::class, 'create']);
Route::post('add-category-process', [App\Http\Controllers\admin\CategoryController::class, 'store']);

Route::get('add-product', [App\Http\Controllers\admin\ProductController::class, 'create']);
Route::post('add-product-process', [App\Http\Controllers\admin\ProductController::class, 'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'show'])->name('login');

Route::get('view-category', [App\Http\Controllers\admin\CategoryController::class, 'index'])->name('view-category');
Route::get('update-category/{id}', [App\Http\Controllers\admin\CategoryController::class, 'edit'])->name('update-category');
Route::get('delete-category/{id}', [App\Http\Controllers\admin\CategoryController::class, 'destroy'])->name('delete-category');
Route::post('update-category-process/{id}', [App\Http\Controllers\admin\CategoryController::class, 'update'])->name('update-category-process');

Route::get('view-product', [App\Http\Controllers\admin\ProductController::class, 'index'])->name('view-product');
Route::get('update-product/{id}', [App\Http\Controllers\admin\ProductController::class, 'edit'])->name('update-product');
Route::post('update-product-process/{id}', [App\Http\Controllers\admin\productController::class, 'update'])->name('update-product-process');
Route::get('/remove-product/{id}', [App\Http\Controllers\admin\ProductController::class, 'destroy'])->name('remove-product');

// Route::get('add-subcategory', function () {
//     return view('admin.add-subcategory');
// });
