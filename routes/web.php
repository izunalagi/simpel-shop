<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Middleware\Authenticate;

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

Route::get('/', function () {
    return view('home.index');
})->name('product.welcome');


Route::middleware(['auth'])->group(function(){
Route::get('/product/data', [ProductsController::class,'index'])->name('product.index');
Route::get('/product/create', [ProductsController::class,'create'])->name('product.create');
Route::post('/product/store', [ProductsController::class,'store'])->name('product.store');
Route::get('/product/edit/{id}', [ProductsController::class,'edit'])->name('product.edit');
Route::put('/product/update/{id}', [ProductsController::class,'update'])->name('product.update');
Route::post('/product/destroy/{id}', [ProductsController::class,'destroy'])->name('product.destroy');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/beranda', function() {
    return view('home.index');
})->name('home.index');
});


Route::get('/profile', function (){

})->middleware(Authenticate::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
