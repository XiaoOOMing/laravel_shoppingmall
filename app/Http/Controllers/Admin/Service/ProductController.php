<?php

namespace App\Http\Controllers\Admin\Service;

use App\Logics\Show;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function add(Request $request)
    {
        // 添加产品信息
        $data = $request->input();
        $product = new Products();
        $product->category_id = $data['subCategory'];
        $product->name = $data['name'];
        $product->summary = $data['summary'];
        $product->preview = $data['images'][0];
        $product->price = (int)($data['price'] * 100);
        $product->save();

        // 添加产品内容
        $product_detail = new ProductDetail();
        $product_detail->product_id = $product->id;
        $product_detail->content = $data['content'];
        $product_detail->save();

        // 添加产品轮播图
        foreach ($data['images'] as $image) {
            $product_images = new ProductImage();
            $product_images->url = $image;
            $product_images->product_id = $product->id;
            $product_images->save();
        }

        // 添加成功
        return Show::show(1, 'ok');

    }
}
