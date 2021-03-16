<?php

use App\Http\Controllers\Api\v1\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api\v1', 'prefix' => 'v1'], function () {
    Route::prefix('/customer')->group(function () {
        //検索一覧表示
        Route::get('', [CustomerController::class, 'index'])->name('customer_index');

        //検索一覧の検索時
        Route::post('', [CustomerController::class, 'search'])->name('customer_search');

        //新規登録の表示
        Route::get('/create', [CustomerController::class, 'create'])->name('customer_create');

        //詳細の表示
        Route::get('/detail/{id}', [CustomerController::class, 'detail'])->name('customer_detail');

        //編集の表示
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer_edit');

        //新規登録で登録時
        Route::post('/store', [CustomerController::class, 'store'])->name('customer_store');

        //編集で更新時
        Route::put('/update', [CustomerController::class, 'update'])->name('customer_update');

        //詳細で削除
        Route::delete('/delete', [CustomerController::class, 'delete'])->name('customer_delete');
    });
});
