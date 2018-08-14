<?php

namespace App\Http\Controllers\View;

use App\Logics\Price;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // Book categories.
    public function index()
    {
        // 获取pid=0的分类
        $categorys = Category::where('pid', 0)->select('id', 'name')->get();
        return view('book.category', [
            'categorys' => $categorys
        ]);
    }

    // Lists
    public function products($id)
    {
        $products = Products::where('category_id', $id)->select('id', 'name', 'summary', 'preview', 'price')->get();
        $products = Price::price_format($products);
        $title = Category::where('id', $id)->value('name');
        return view('book.products', [
            'products' => $products,
            'title' => $title,
        ]);
    }
}
