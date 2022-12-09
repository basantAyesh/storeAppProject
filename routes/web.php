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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/Dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard')->middleware('auth');

Route::get('store/products/search',[\App\Http\Controllers\FrontController::class,'search'])->name('search');
Route::get('/',[\App\Http\Controllers\FrontController::class,'stores']);
Route::get('store/products/{id}',[\App\Http\Controllers\FrontController::class,'storeProducts']);
Route::get('transactions/add/{id}',[\App\Http\Controllers\FrontController::class,'storeTransaction'])->name('storeTransaction');



Route::resource('stores',\App\Http\Controllers\StoreController::class)->middleware('auth');
Route::resource('products', \App\Http\Controllers\ProductController::class)->middleware('auth');
Route::get('purchase_tranactions/Report',[\App\Http\Controllers\PurchaseTransactionController::class,'showReport'])->name('Show_report');
Route::resource('purchase_transactions', \App\Http\Controllers\PurchaseTransactionController::class)->middleware('auth');
