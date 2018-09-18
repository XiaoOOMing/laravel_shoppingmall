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

// 登录
Route::get('/login', 'View\LoginController@index')->middleware('has_login');

// 注册
Route::get('/register', 'View\RegisterController@index')->middleware('has_login');

/**
 * 需要登录的视图
 */
Route::group(['middleware' => 'check_login_redirect'], function () {
    // 购物车
    Route::get('/car', 'View\CarController@index');

    // 收银台 | 确认订单
    Route::get('/payment/{order_no}', 'View\OrderController@payment');

    // 订单中心
    Route::get('/orders', 'View\OrderController@index');

    // 评价订单
    Route::get('/comment/{order_no}/{product_id}', 'View\OrderController@comment');

    // 待评价商品列表
    Route::get('/comment_list/{order_no}', 'View\OrderController@comment_list');
});

/**
 * 后台视图
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Admin\LoginController@index');
    Route::post('login', 'Admin\LoginController@login');
    /**
     * 需要登录的后台视图
     */
    Route::group(['middleware' => 'check_admin'], function () {
        // 首页
        Route::get('/', 'Admin\AdminController@index');

        // 欢迎页
        Route::get('/welcome', 'Admin\AdminController@welcome');

        // 产品首页
        Route::get('/product','Admin\ProductController@index');

        // 添加产品
        Route::get('/product/add', 'Admin\ProductController@add');
        Route::post('/product/add', 'Admin\Service\ProductController@add');

        // 删除产品
        Route::post('/product/delete', 'Admin\Service\ProductController@delete');

        // 上传产品图片
        Route::post('uploader', 'Admin\UploaderController@images');
    });
});
/**
 * 服务器接口
 */
Route::group(['prefix' => 'service'], function () {
    // 根据上级分类id查询分类
    Route::post('category/{parent_id}', 'Service\CategoryController@categories');

    // 用户登录
    Route::post('/login', 'Service\LoginController@login');

    // 注册
    Route::post('/register', 'Service\RegisterController@regist');

    // 注销
    Route::post('/logout', 'Service\LoginController@logout');

    // 验证码
    Route::get('/validate_code', 'Service\LoginController@validate_code');

    /**
     * 需要验证登录的接口
     */
    Route::group(['middleware' => 'check_login'], function () {
        // 添加购物车
        Route::post('car', 'Service\CarController@add_car');

        // 购物车选中状态
        Route::post('car/check', 'Service\CarController@check');

        // 删除购物车
        Route::post('delete_car', 'Service\CarController@delete_car');

        // 提交订单
        Route::post('order', 'Service\OrderController@create_order');

        // 删除订单
        Route::post('order_delete', 'Service\OrderController@delete_order');

        // 支付
        Route::post('pay', 'Service\OrderController@pay');

        // 确认收货
        Route::post('affirm_order', 'Service\OrderController@affirm_order');

        // 评价商品
        Route::post('order_comment', 'Service\OrderController@comment');
    });
});
