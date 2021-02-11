<?php

use App\Http\Controllers\StockController;
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
/* Route::get('/', function(){
    return view("welcome");
}); */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/stock', [App\Http\Controllers\StockController::class, 'show'])->name('stock-show');

/*Rotas para cadastrar estoque*/
Route::get('/stock/add', [App\Http\Controllers\StockController::class, 'create'])->name('stock-add');
Route::post('/stock/add', [App\Http\Controllers\StockController::class, 'store'])->name('store-stock');

/*Rotas para editar estoque*/
Route::get('/stock/edit/{id}', [App\Http\Controllers\StockController::class, 'edit'])->name('edit-stock');
Route::post('/stock/edit/{id}', [App\Http\Controllers\StockController::class, 'update'])->name('update-stock');

/*Rotas para excluir estoque*/
Route::delete('stock/delete/{id}', [App\Http\Controllers\StockController::class, 'delete'])->name('delete');