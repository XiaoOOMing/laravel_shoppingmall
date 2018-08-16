<?php

namespace App\Http\Controllers\Admin;

use App\Logics\Price;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    // 产品首页
    public function index()
    {
        $products = Products::all();
        $products = Price::price_format($products);
        return view('admin.product', [
            'products' => $products
        ]);
    }

    // 添加产品
    public function add() {
        // 分类
        $categorys = Category::where('pid', 0)->get();
        return view('admin.product_add', [
            'categorys' => $categorys
        ]);
    }
}
