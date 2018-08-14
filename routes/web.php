<?php

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

/**
 * 视图
 */
// 书籍列表
Route::get('/', 'View\CategoryController@index');

// 列表详情
Route::get('/products/{category_id}', 'View\CategoryController@products');

// 内容详情
Route::get('/product/{id}', 'View\ProductController@index');

// 购物车

// 提交订单

// 结算


/**
 * 服务器接口
 */
Route::group(['prefix' => 'service'], function () {
    Route::post('category/{parent_id}', 'Service\CategoryController@categories');
});