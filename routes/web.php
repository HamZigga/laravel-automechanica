<?php

use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ProductTypeController::class, 'index'])->name('main');
Route::get('/category/{id}', [ProductTypeController::class, 'show'])->name('category.show');
Route::get('/category', [ProductTypeController::class, 'showAll'])->name('category');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.item');
Route::get('/personalarea', [UserController::class, 'show'])->middleware('auth')->name('personal.area');

require __DIR__.'/auth.php';
