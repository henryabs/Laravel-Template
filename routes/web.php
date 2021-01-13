<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
	Route::get('/', [DashboardController::class, 'index'])->name('dashboard.home');
});

Route::group(['prefix' => 'products', 'middleware' => 'auth'], function(){
	Route::get('/', [ProductController::class, 'index'])->name('products.home');
});