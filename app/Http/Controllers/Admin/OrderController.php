<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Province;
use App\Models\Ward;


class OrderController extends Controller
{
    public function index()
    {
        $order = Order::where('status', '0')->latest()->get();
        return view('Admin.orders.index', compact('order'));
    }
    public function view($id)
    {
        $order = Order::where('id', $id)->first();
        $province = Province::whereId($order->province_id)->first();
        $district = District::whereId($order->district_id)->first();
        $ward = Ward::whereId($order->ward_id)->first();
        return view('Admin.orders.view', compact('order', 'province', 'district', 'ward'));
    }

    public function updateOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->input('order_status');
        $order->update();
        return redirect('orders')->with('status', 'Order Status Updated Successfully');
    }
    public function orderHistory()
    {
        $order = Order::where('status', '1')->get();
        return view('Admin.orders.completedOrders', compact('order'));
    }
}