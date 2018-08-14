<?php

namespace App\Http\Controllers\Service;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function categories($parent_id)
    {
        $categories = Category::where('pid', $parent_id)->select('id','name')->get();
        return $categories;
    }
}
