<?php

namespace App\Http\Controllers\Service;

use App\Logics\Member;
use App\Logics\Price;
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

    // 购物车选中状态
    public function check(Request $request)
    {
        // 修改选中状态
        $data = $request->input();
        $member = $request->session()->get('member');
        Car::where('member_id', $member->id)
            ->where('product_id', $data['id'])
            ->update(['checked' => $data['checked']]);

        // 获取购物车总金额
        $checked = Car::where('member_id', $member->id)
            ->where('checked', 1)
            ->get();
        $total = 0;
        foreach ($checked as $vo) {
            $total += $vo->product->price * $vo->count;
        }
        $total = Price::price_format($total);
        return Show::show(1, 'Checked changed success!', [
            'total' => $total
        ]);
    }

    // 删除购物车
    public function delete_car(Request $request)
    {
        $data = $request->input();
        $member = $request->session()->get('member');

        $car = Car::where('member_id', $member->id)
            ->whereIn('product_id', $data['product_id'])
            ->delete();
        return Show::show(1, '删除成功');
    }
}
