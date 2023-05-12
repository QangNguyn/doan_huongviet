<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\support\Facades\Auth;
use App\Jobs\SendOrderConfirmationEmail;
use App\Models\Province;
use App\Jobs\SendOrderNotificationEmail;
use App\Models\District;
use App\Models\Ward;

class CheckoutController extends Controller
{
    public function index()
    {
        $provinces =  Province::all();
        return view('frontend.checkout', compact('provinces'));
    }

    public function placeOrder(CheckoutRequest $request)
    {
        $order  = new Order();
        $order->user_id = Auth::id() ? Auth::id() : null;
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->province_id = $request->input('province_id');
        $order->district_id = $request->input('district_id');
        $order->ward_id = $request->input('ward_id');
        $order->address = $request->input('address');

        $order->total_price = Cart::subtotal();

        $order->tracking_no = 'huongviet' . rand(1111, 9999);
        $order->save();

        foreach (Cart::content() as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->id,
                'qty' => $item->qty,
                'price' => $item->price,
            ]);

            $prod  = Product::where('id', $item->id)->first();
            $prod->qty = $prod->qty - $item->qty;
            $prod->update();
        }
        $adminMail = config('mail.admins');

        $province = Province::whereId($order->province_id)->first();
        $district = District::whereId($order->district_id)->first();
        $ward = Ward::whereId($order->ward_id)->first();
        SendOrderConfirmationEmail::dispatch($order);
        SendOrderNotificationEmail::dispatch($order, $province, $district, $ward, $adminMail);


        Cart::destroy();


        return redirect('/')->with('status', "Đơn hàng của bạn đã được ghi nhận");
    }
}
