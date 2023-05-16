<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\Order;
use App\Models\District;
use App\Models\Ward;
use App\Models\Province;
use App\Models\Product;
class UserController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id',Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function viewOrder($id)
    {
        $order = Order::where('id' , $id)->where('user_id',Auth::id())->first();
        $province = Province::whereId($order->province_id)->first();
        $district = District::whereId($order->district_id)->first();
        $ward = Ward::whereId($order->ward_id)->first();
        return view('frontend.orders.view', compact('order','province','district','ward'));
    }

    public function removeOrder($id) {
        $order = Order::where('id' , $id)->where('user_id',Auth::id())->first();
        if($order->status  == 0){
            $orderItems = $order->orderItems;
            foreach ($orderItems as $item){
                $prod  = Product::where('id', $item->product->id)->first();
                $prod->qty = $prod->qty + $item->qty;
                $prod->update();
                $item->delete();
            }
            $order->delete();
            return back()->with('status', "Hủy đơn hàng thành công");
        }
        else {
            return back()->with('status', "Đơn hàng đã giao thành công, không thể hủy");
        }

    }

}
