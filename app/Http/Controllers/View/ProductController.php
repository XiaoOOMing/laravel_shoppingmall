<?php

namespace App\Http\Controllers\View;

use App\Logics\Price;
use App\Models\Car;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request, $id)
    {
        $product = Products::where('id', $id)->first();
        $product = Price::price_format($product);
        $product_images = ProductImage::where('product_id', $id)->get();
        $product_content = ProductDetail::where('product_id', $id)->first();
        $member = $request->session()->get('member');
        if ($member) {
            $car_count = Car::where('member_id', $member->id)->sum('count');
        } else {
            $car_count = 0;
        }
        return view('book.product', [
            'product' => $product,
            'product_images' => $product_images,
            'product_content' => $product_content,
            'car_count' => $car_count,
        ]);
    }
}
