<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VueController;

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

// TODO: 必须设置 vue, 用作视图渲染和权限管理
//Route::middleware(['auth'])->prefix('/admin')->group(function () {
Route::middleware([])->prefix('/admin')->group(function () {
    Route::get('/vue', [VueController::class, 'index'])->name('admin.vue.index');
});
