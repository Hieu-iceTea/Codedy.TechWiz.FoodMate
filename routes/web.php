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


/*
|--------------------------------------------------------------------------
| Front
|--------------------------------------------------------------------------
|
*/

Route::prefix('')->middleware('CheckMemberLogin')->group(function () {
    Route::get('', [App\Http\Controllers\Front\HomeController::class, 'index']);
    Route::get('about', [App\Http\Controllers\Front\HomeController::class, 'about']);
    Route::get('faq', [App\Http\Controllers\Front\HomeController::class, 'faq']);
    Route::get('service', [App\Http\Controllers\Front\HomeController::class, 'service']);

    Route::prefix('menu')->group(function () {
        Route::get('', [App\Http\Controllers\Front\MenuController::class, 'index']);
        Route::get('{id}', [App\Http\Controllers\Front\MenuController::class, 'show']);
    });

    Route::prefix('restaurant')->group(function () {
        Route::get('', [App\Http\Controllers\Front\RestaurantController::class, 'index']);
        Route::get('{id}', [App\Http\Controllers\Front\RestaurantController::class, 'show']);
    });

    Route::prefix('cart')->group(function () {
        Route::get('/', [App\Http\Controllers\Front\CartController::class, 'index']);
        Route::get('add/{id}', [App\Http\Controllers\Front\CartController::class, 'add']);
        Route::get('delete/{rowId}', [App\Http\Controllers\Front\CartController::class, 'delete']);
        Route::get('/destroy', [App\Http\Controllers\Front\CartController::class, 'destroy']);
        Route::get('/update/{rowId}', [App\Http\Controllers\Front\CartController::class, 'update']);
    });

    Route::prefix('checkout')->group(function () {
        Route::get('', [App\Http\Controllers\Front\CheckOutController::class, 'index']);
        Route::post('/', [\App\Http\Controllers\Front\CheckOutController::class, 'addOrder']);
        Route::get('/result', [\App\Http\Controllers\Front\CheckOutController::class, 'result']);
    });

    Route::prefix('contact')->group(function () {
        Route::get('', [App\Http\Controllers\Front\ContactController::class, 'index']);
        Route::post('/', [App\Http\Controllers\Front\ContactController::class, 'addContact']);
        Route::get('/result', [App\Http\Controllers\Front\ContactController::class, 'result']);
    });

    Route::prefix('account')->group(function () {
        Route::redirect('/', '/account/my-order'); //Chuyển hướng

        Route::get('/login', [\App\Http\Controllers\Front\AccountController::class, 'login']);
        Route::post('/login', [\App\Http\Controllers\Front\AccountController::class, 'checkLogin']);

        Route::get('/logout', [\App\Http\Controllers\Front\AccountController::class, 'logout']);

        Route::get('/register', [\App\Http\Controllers\Front\AccountController::class, 'register']);
        Route::post('/register', [\App\Http\Controllers\Front\AccountController::class, 'postRegister']);

        Route::prefix('/my-order')->group(function () {
            Route::get('/', [App\Http\Controllers\Front\AccountController::class, 'myOrderIndex']);
            Route::get('/{id}', [\App\Http\Controllers\Front\AccountController::class, 'myOrderShow']);
        });
    });

    Route::prefix('feedback')->group(function () {
        Route::get('', [App\Http\Controllers\Front\FeedbackController::class, 'index']);
        Route::post('/', [App\Http\Controllers\Front\FeedbackController::class, 'addFeedback']);
        Route::get('/result', [App\Http\Controllers\Front\FeedbackController::class, 'result']);
    });
});


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
|
*/


Route::prefix('admin')->middleware('CheckAdminLogin')->group(function () {
    Route::get('/', [App\Http\Controllers\admin\HomeController::class, 'index']);

    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('order', App\Http\Controllers\Admin\OrderController::class);
    Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('restaurant', App\Http\Controllers\Admin\RestaurantController::class);
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::resource('feedback', App\Http\Controllers\Admin\FeedbackController::class);

    Route::prefix('login')->group(function () {
        Route::get('', [\App\Http\Controllers\Admin\HomeController::class, 'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('', [App\Http\Controllers\Admin\HomeController::class, 'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });

    Route::get('logout', [App\Http\Controllers\Admin\HomeController::class, 'logout']);
});
