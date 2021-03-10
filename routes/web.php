<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VueController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ShopProductController;
use App\Http\Controllers\ShopOrderController;

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

// TODO: 视图路由必须设置 name, 用作视图渲染和权限管理

Route::get('/admin/auth/login', [AuthController::class, 'login'])->name('admin.auth.login');
Route::post('/admin/auth/login', [AuthController::class, 'loginPost']);
Route::get('/admin/auth/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->prefix('/admin')->group(function () {
    Route::get('/vue', [VueController::class, 'index'])->name('admin.vue.index');

    // 店铺管理
    Route::get('/shop', [ShopController::class, 'index'])->name('admin.shop.index');
    Route::get('/shop/oauth', [ShopController::class, 'oauth']);

    Route::get('/warehouse', [WarehouseController::class, 'index'])->name('admin.warehouse.index');

    Route::get('/product', [ProductController::class, 'index'])->name('admin.product.index');

    Route::get('/purchase', [PurchaseController::class, 'index'])->name('admin.purchase.index');

    Route::get('/shop_product', [ShopProductController::class, 'index'])->name('admin.shop_product.index');

    Route::get('/shop_order', [ShopOrderController::class, 'index'])->name('admin.shop_order.index');
});
