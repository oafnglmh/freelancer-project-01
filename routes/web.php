<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\sizeController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\StatusController;
use App\Models\Statistical;

/*
|--------------------------------------------------------------------------
| Web Routes    
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/account')->group(function () {
    Route::get('/login', [UserController::class, 'register'])->name('register');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/getinfo', [UserController::class, 'getinfo'])->name('getinfo');
    Route::post('/loginnow', [UserController::class, 'login'])->name('loginnow');
    Route::Get('/profile', [UserController::class, 'viewprofile'])->name('viewprofile');

    Route::get('/forget-password', [UserController::class, 'forgetPass'])->name('fogetPass');
    Route::post('/forget-password', [UserController::class, 'actived']);
    Route::get('/get-password/{user}/{token}', [UserController::class, 'getPass'])->name('getPass');
    Route::post('/get-password/{user}/{token}', [UserController::class, 'postGetPass'])->name('postForget');
});

Route::prefix('/')->group(function () {
    Route::get('/', [ProductController::class, 'viewhome'])->name('viewhome');
    Route::prefix('/collections')->group(function () {
        Route::get('/product/{url}', [ProductController::class, 'type_product']);
        Route::get('/product', [UserController::class, 'viewproduct'])->name('viewproduct');
        Route::get('/producnew', [UserController::class, 'viewproductnew'])->name('viewproductnew');
        Route::get('/product_desciption', [UserController::class, 'Product_Description'])->name('viewproduct_desciption');
        Route::get('/online', [UserController::class, 'viewproduct'])->name('viewproductonline');
        Route::get('/bosutap', [UserController::class, 'viewcollection'])->name('viewcollection');
        Route::get('/productsale', [UserController::class, 'viewproductsale'])->name('viewproductsale');
        Route::get('/productsale/{url}', [UserController::class, 'productsale']);
    });
    Route::get('/pay', [UserController::class, 'viewpay'])->name('viewpay');
    Route::post('/addPay', [UserController::class, 'addPayCart'])->name('addpay');
    Route::get('/cart', [UserController::class, 'viewcart'])->name('viewcart');
    Route::get('/deleteCart/{id}', [UserController::class, 'deleteCart']);
});

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('index');
    Route::prefix('/product')->group(function () {
        Route::get('/add', [ProductController::class, 'create']);
        Route::get('/list', [ProductController::class, 'list'])->name('list');
        Route::post('/set', [ProductController::class, 'setproduct'])->name('setproduct');
        Route::get('/edit/{id}', [ProductController::class, 'store']);
        Route::post('/edit/{id}', [ProductController::class, 'edit'])->name('eidt');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('delete');
    });
    Route::prefix('/menu')->group(function () {
        Route::get('/add', [MenuController::class, 'create']);
        Route::post('/add', [MenuController::class, 'add'])->name('addMenu');
        Route::get('/list', [MenuController::class, 'list']);
        Route::get('/edit/{id}', [MenuController::class, 'store']);
        Route::post('/edit/{id}', [MenuController::class, 'edit'])->name('editMenu');
        Route::get('/delete/{id}', [MenuController::class, 'delete']);
    });
    Route::prefix('/color')->group(function () {
        Route::get('/add', [ColorController::class, 'create']);
        Route::post('/add', [ColorController::class, 'add'])->name('addColor');
        Route::get('/list', [ColorController::class, 'list']);
        Route::get('/edit/{id}', [ColorController::class, 'store']);
        Route::post('/edit/{id}', [ColorController::class, 'edit'])->name('editColor');
        Route::get('/delete/{id}', [ColorController::class, 'delete']);
    });
    Route::prefix('/status')->group(function () {
        Route::get('/add', [StatusController::class, 'create']);
        Route::post('/add', [StatusController::class, 'add'])->name('addStatus');
        Route::get('/list', [StatusController::class, 'list']);
        Route::get('/edit/{id}', [StatusController::class, 'store']);
        Route::post('/edit/{id}', [StatusController::class, 'edit']);
        Route::get('/delete/{id}', [StatusController::class, 'delete']);
    });
    Route::prefix('/size')->group(function () {
        Route::get('/add', [sizeController::class, 'create']);
        Route::post('/add', [sizeController::class, 'add'])->name('addSize');
        Route::get('/list', [sizeController::class, 'list']);
        Route::get('/edit/{id}', [sizeController::class, 'store']);
        Route::post('/edit/{id}', [sizeController::class, 'edit']);
        Route::get('/delete/{id}', [sizeController::class, 'delete']);
    });
    Route::prefix('/slide')->group(function () {
        Route::get('/add', [SlideController::class, 'create']);
        Route::get('/list', [SlideController::class, 'list']);
        Route::post('/set', [SlideController::class, 'setproduct'])->name('setproduct2');
        Route::get('/edit/{id}', [SlideController::class, 'store']);
        Route::post('/edit/{id}', [SlideController::class, 'edit']);
        Route::get('/delete/{id}', [SlideController::class, 'delete'])->name('delete');
    });
    Route::prefix('/statistical')->group(function () {
        Route::get('/main', [AdminController::class, 'main']);
        Route::Post('/main', [AdminController::class, 'getDataWithDay']);

        Route::get('/list/{id}', [AdminController::class, 'listStatisUser']);
        Route::get('/user-role/{id}', [AdminController::class, 'role']);
        Route::post('/user-role/{id}', [Statistical::class, 'postRole'])->name('postRole');
        Route::get('/delete-role/{id}', [Statistical::class, 'deleteRole']);
    });
    Route::prefix('/order')->group(function () {
        Route::get('/list', [OrderController::class, 'list']);
        Route::get('/edit/{id}', [OrderController::class, 'store']);
        Route::post('/edit/{id}', [OrderController::class, 'edit']);
        Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('detail');
    });
});
Route::get('/search', [ProductController::class, 'search']);
Route::post('/updateQuantityCart', [AdminController::class, 'updateQuantityCart'])->name('updateQuantityCart');
Route::get('/product/{id}', [ProductController::class, 'click']);
Route::POST('/addPay/{id}', [UserController::class, 'addPay']);
Route::get('/productSearch/{id}', [UserController::class, 'viewproductnewSearch'])->name('viewproductnewSearch');
Route::get('cc', [ProductController::class, 'type_product']);
Route::get('auth/google', [UserController::class, 'redirectToGoogle'])->name('login-by-google');
Route::get('auth/google/callback', [UserController::class, 'handleGoogleCallback']);
Route::POST('/comment', [UserController::class, 'comment']);
Route::POST('/chartday', [AdminController::class, 'chartday']);
Route::POST('/chart30day', [AdminController::class, 'chart30day']);
Route::POST('/chartdayhai', [AdminController::class, 'chartdayhai']);
Route::prefix('/donhang')->group(function () {
    Route::get('/', [UserController::class, 'showorder'])->name('orders');
    Route::get('/detail/{id}', [UserController::class, 'detail'])->name('detail');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// Route::get('cc', [UserController::class, 'datepicker']);
