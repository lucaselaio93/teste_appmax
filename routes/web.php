<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* Rota para exibir estoques */

Route::get('/stock', [StockController::class, 'show'])->name('stock-show')->middleware('auth');

/* Rotas para cadastrar estoque */
Route::get('/stock/add', [StockController::class, 'create'])->name('stock-add')->middleware('auth');
Route::post('/stock/add', [StockController::class, 'store'])->name('store-stock')->middleware('auth');

/* Rotas para editar estoque */
Route::get('/stock/edit/{id}', [StockController::class, 'edit'])->name('edit-stock')->middleware('auth');
Route::post('/stock/edit/{id}', [StockController::class, 'update'])->name('update-stock')->middleware('auth');

/* Rota para excluir estoque */
Route::delete('stock/delete/{id}', [StockController::class, 'delete'])->name('delete-stock')->middleware('auth');

/* Rota para atribuir produto ao estoque */
Route::get('stock/add/products', [StockController::class, 'addToStock'])->name('stock-product-add')->middleware('auth');
Route::post('stock/add/products', [StockController::class, 'addProductToStock'])->name('product-stock-add')->middleware('auth');

/* Rota para dar baixa do produto no estoque */
Route::get('stock/drop/products/{id}', [StockController::class, 'dropToStock'])->name('stock-product-drop')->middleware('auth');
Route::post('stock/drop/products', [StockController::class, 'dropProductToStock'])->name('product-stock-drop')->middleware('auth');


/* Rota para exibir produtos */
Route::get('/product', [ProductController::class, 'show'])->name('product-show')->middleware('auth');

/* Rotas para cadastrar produtos */
Route::get('/product/add', [ProductController::class, 'create'])->name('product-add')->middleware('auth');
Route::post('/product/add', [ProductController::class, 'store'])->name('store-product')->middleware('auth');

/* Rotas para editar produtos */
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('edit-product')->middleware('auth');
Route::post('/product/edit/{id}', [ProductController::class, 'update'])->name('update-product')->middleware('auth');

/* Rota para excluir estoque */
Route::delete('product/delete/{id}', [ProductController::class, 'delete'])->name('delete-product')->middleware('auth');