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

Route::prefix('')->group(function () {
    Route::get('', [App\Http\Controllers\Front\HomeController::class, 'index']);

    Route::prefix('menu')->group(function () {
        Route::get('', [App\Http\Controllers\Front\MenuController::class, 'index']);
    });

    Route::prefix('checkout')->group(function () {
        Route::get('', [App\Http\Controllers\Front\CheckOutController::class, 'index']);
    });
});
