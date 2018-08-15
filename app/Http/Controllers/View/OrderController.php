<?php

namespace App\Http\Controllers\View;

use App\Logics\Member;
use App\Logics\Price;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    // 收银台 | 确认订单
    public function payment(Request $request, $order_no)
    {
        $member = Member::member($request);
        $order = Order::where('order_no', $order_no)->where('member_id', $member->id)->first();
        $order = Price::price_format($order);
        $products = OrderItem::where('order_id', $order->id)->get();
        $count = 0;
        foreach ($products as $key => $product) {
            $products[$key]['info'] = Price::price_format(json_decode($product['product_info'], true));
            $count += $product['count'];
        }
        return view('book.payment', [
            'products' => $products,
            'order' => $order,
            'count' => $count
        ]);
    }

    // 订单中心
    public function index(Request $request)
    {
        $member = Member::member($request);
        $orders = Order::where('member_id', $member->id)->orderBy('id', 'desc')->get();
        $orders = Price::price_format($orders);
        return view('book.order', [
            'orders' => $orders
        ]);
    }

    // 待评价商品列表
    public function comment_list(Request $request, $order_no)
    {
        // 获取商品快照
        $member = Member::member($request);
        $order = Order::where('order_no', $order_no)->where('member_id', $member->id)->first();
        $order_item = $order->order_item;
        return view('book.comment_list', [
            'order_item' => $order_item,
            'order_no' => $order_no
        ]);
    }

    // 评价订单
    public function comment(Request $request, $order_no, $product_id)
    {
        // 判断订单是否可以评价。如果该订单不能评价，返回订单中心
        $member = Member::member($request);
        $order = Order::where('order_no', $order_no)->where('member_id', $member->id)->first();
        if (!$order || $order->status != 3) {
            return redirect('/orders');
        }
        $order_item = OrderItem::where('product_id', $product_id)->where('order_id', $order->id)->first();
        if (!$order_item || $order_item->status != 0) {
            return redirect('/orders');
        }
        
        return view('book.comment', [
            'order_no' => $order_no,
            'product_id' => $product_id
        ]);
    }
}
