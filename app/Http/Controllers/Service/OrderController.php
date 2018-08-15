<?php

namespace App\Http\Controllers\Service;

use App\Logics\Show;
use App\Models\Car;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function create_order(Request $request)
    {
        // 判断产品ID是否存在
        $product_id = $request->input('product_id');
        if (!is_array($product_id) || count($product_id) == 0) {
            return Show::show(0, '请先选择需要购买的产品');
        }

        // 生成订单编号
        $member = $request->session()->get('member');
        $order_no = md5($member->id . $member->email . time());

        // 计算总价
        $price = 0;
        $car = Car::where('member_id', $member->id)->where('checked', 1)->get();
        $validate_pid = [];
        foreach ($car as $vo) {
            if (in_array($vo->product_id, $product_id)) {
                $price += $vo->product->price * $vo->count;
                $validate_pid[] = $vo->product_id;
            }
        }
        if ($price == 0) {
            return Show::show(0, '请先选择需要购买的产品');
        }

        // 清空购物车
        Car::where('member_id', $member->id)->whereIn('product_id', $validate_pid)->delete();

        // 生成订单
        $order = new Order();
        $order->order_no = $order_no;
        $order->member_id = $member->id;
        $order->price = $price;
        $order->status = 0;
        $order->save();
        foreach ($car as $vo) {
            if (in_array($vo->product_id, $product_id)) {
                $order_item = new OrderItem();
                $order_item->product_id = $vo->product_id;
                $order_item->count = $vo->count;
                $order_item->order_id = $order->id;
                $order_item->product_info = json_encode([
                    'name' => $vo->product->name,
                    'summary' => $vo->product->summary,
                    'preview' => $vo->product->preview,
                    'price' => $vo->product->price,
                ]);
                $order_item->save();
            }
        }

        // 返回成功信息
        return Show::show(1, '订单生成成功', ['order_no' => $order_no]);
    }
}
