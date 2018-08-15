<?php

namespace App\Http\Controllers\Service;

use App\Logics\Member;
use App\Logics\Show;
use App\Models\Car;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    // 提交订单
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

    // 支付
    public function pay(Request $request)
    {
        // 获取订单编号
        $order_no = $request->input('order_no');

        // 判断订单状态
        $member = Member::member($request);
        $order = Order::where('member_id', $member->id)->where('order_no', $order_no)->first();
        if (!($order && $order->status == 0)) {
            return Show::show(0, '该订单已支付，请到订单中心确认。');
        }

        // 支付逻辑
        // Todo::支付的逻辑（因为没有微信和支付宝认证号 无法真实支付 ~QAQ~）

        // 修改订单状态
        $order->status = 1;
        $order->save();

        // 支付成功
        return Show::show(1, '支付成功');
    }

    // 删除订单
    public function delete_order(Request $request)
    {
        // 获取订单ID
        $order_id = $request->input('order_id');

        // 验证订单是否可以删除
        $member = Member::member($request);
        $order = Order::where('id', $order_id)->where('member_id', $member->id)->first();
        if (!$order || $order->status != 0) {
            return Show::show(0, '抱歉，该订单不能删除');
        }

        $order->delete();
        return Show::show(1, '订单删除成功');
    }

    // 确认收货
    public function affirm_order(Request $request)
    {
        // 获取订单ID
        $order_id = $request->input('order_id');

        // 验证订单状态
        $member = Member::member($request);
        $order = Order::where('id', $order_id)->where('member_id', $member->id)->first();
        if (!$order || $order->status != 2) {
            return Show::show(0, '抱歉，目前不能确认收货');
        }

        $order->status = 3;
        $order->save();
        return Show::show(1, '成功确认收货');
    }

    // 评价商品
    public function comment(Request $request)
    {
        // 验证商品是否可以评价
        $member = Member::member($request);
        $data = $request->input();
        $order = Order::where('member_id', $member->id)->where('order_no', $data['order_no'])->first();
        if (!$order || $order->status != 3) {
            return Show::show(0, '该订单无法评价');
        }
        $order_item = OrderItem::where('order_id', $order->id)->where('product_id', $data['product_id'])->first();
        if (!$order_item || $order_item->status != 0) {
            return Show::show(0, '该订单无法评价');
        }

        // 开始评价
        $order_item->status = 1;
        $order_item->save();

        if (!OrderItem::where('order_id', $order->id)->where('status', 0)->first()) {
            $order->status = 4;
            $order->save();
        }

        $comment = new Comment();
        $comment->member_id = $member->id;
        $comment->product_id = $data['product_id'];
        $comment->content = $data['content'];
        $comment->score = $data['score'];
        $comment->save();

        // 评价完毕 返回信息
        return Show::show(1, '评价成功');
    }
}
