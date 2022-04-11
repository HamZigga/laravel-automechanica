<?php

use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\StatementController;
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
Route::post('/purchase/store', [PurchaseController::class, 'store'])->middleware('auth')->name('purchase');
Route::get('/cart', [PurchaseController::class, 'show'])->middleware('auth')->name('cart');
Route::get('/cart/{id}/delete', [PurchaseController::class, 'disable'])->middleware('auth')->name('cart.disable');
Route::get('/statement', [StatementController::class, 'create'])->middleware('auth')->name('statement');
Route::post('/statement/create', [StatementController::class, 'store'])->middleware('auth')->name('statement.create');
Route::get('/personalarea', [UserController::class, 'show'])->middleware('auth')->name('personal.area');

require __DIR__ . '/auth.php';
