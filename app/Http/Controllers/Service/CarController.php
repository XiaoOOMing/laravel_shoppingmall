<?php

namespace App\Http\Controllers\Service;

use App\Logics\Member;
use App\Logics\Show;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    // 添加购物车
    public function add_car(Request $request)
    {
        // 判断该产品购物车是否存在。存在则数量+1，不存在则新建购物车。
        $member = Member::member($request);
        $product_id = $request->input('product_id');
        $car = Car::where('member_id', $member->id)->where('product_id', $product_id)->first();
        if ($car) {
            $car->count = $car->count + 1;
            $car->save();
        } else {
            $car = new Car();
            $car->member_id = $member->id;
            $car->product_id = $product_id;
            $car->count = 1;
            $car->save();
        }

        // 返回购物车数量
        $count = Car::where('member_id', $member->id)->sum('count');
        return Show::show(1, 'ok', ['count' => $count]);
    }
}
