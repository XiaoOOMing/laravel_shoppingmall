<?php

namespace App\Http\Controllers\View;

use App\Models\Category;
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
}
