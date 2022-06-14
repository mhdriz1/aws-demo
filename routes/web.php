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


Route::middleware('auth')->group(function () {

    Route::get('/', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');

    Route::get('elasticsearch', [\App\Http\Controllers\Product\ProductController::class, 'elasticsearch'])->name('elasticsearch');

    Route::get('lambda', [\App\Http\Controllers\Click\ClickController::class, 'lambda'])->name('lambda');

    Route::get('athena', [\App\Http\Controllers\Product\ProductController::class, 'athena'])->name('athena');

    Route::get('rds', [\App\Http\Controllers\Product\ProductController::class, 'rds'])->name('rds');

    Route::get('dynamodb', [\App\Http\Controllers\Product\ProductController::class, 'dynamodb'])->name('dynamodb');

    Route::get('s3', [\App\Http\Controllers\Product\ProductController::class, 's3'])->name('s3');

});


require __DIR__ . '/auth.php';
