<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Province;
use Illuminate\support\Facades\Auth;



class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id  = $request->input('product_id');
        $product_qty = $request->input('product_qty');
        $product = Product::where('id', $product_id)->first();
        $thumbnails = explode(',', $product->image);


        Cart::add([
            'id' => $product_id,
            'name' => $product->name,
            'price' => $product->selling_price,
            'qty' => $product_qty,
            'weight' => 0,
            'options' => [
                'image' =>  $thumbnails[0]
            ]
        ]);


        $cartCount = Cart::count();
        // return response()->json(['status' => $product->selling_price]);
        return response()->json([
            'status' => $product->name . " đã được thêm vào giỏ hàng",
            'count' => $cartCount
        ]);
    }
    public function viewCart()
    {
        $provinces = Province::all();
        $total = Cart::total();

        $totalWithoutDecimals = explode('.', $total)[0];

        $cartItems = Cart::content();
        return view("frontend.cart", compact('cartItems', 'provinces'));
    }
    public function deleteProduct(Request $request)
    {
        $rowId  = $request->input('rowId');
        Cart::remove($rowId);

        return response()->json([
            'status' =>  "Sản phẩm đã được xóa khỏi giỏ hàng",
        ]);
    }

    public function updateCart(Request $request)
    {

        $products = $request->products;

        foreach ($products as $cartItem) {

            $rowId = $cartItem['rowId'];
            $quantity = $cartItem['qty'];


            Cart::update($rowId, $quantity);
        }


        return response()->json([
            'status' => 'success'
        ]);
    }
}