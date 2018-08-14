<?php

namespace App\Http\Controllers\View;

use App\Logics\Price;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    // 购物车页面
    public function index(Request $request)
    {
        // 获取购物车中的产品
        $member = $request->session()->get('member');
        $car  = Car::where('member_id', $member->id)->get();
        $total = 0;
        foreach ($car as $key => $vo) {
            if ($vo['checked'] == 1) {
                $total += $vo->product->price * $vo->count;
            }
            $car[$key]->product->price = Price::price_format($vo->product->price);
        }
        $total = Price::price_format($total);

        return view('book.car', [
            'car' => $car,
            'total' => $total
        ]);
    }
}
