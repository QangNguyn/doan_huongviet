<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(config('const.PER_PAGE'));
        return view('Admin.product.index', compact('products'));
    }
    public function add()
    {

        $categories = Category::where('parent_id', 0)->get();
        return view('Admin.product.add', compact('categories'));
    }

    public function insert(ProductRequest $request)
    {
        $product = new Product();
        $product->fill($request->all())
            ->save();
        return back()->with('status', "Tạo sản phẩm mới thành công");
    }


    public function edit($id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $product = Product::find($id);
        return view('Admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request,  $id)
    {
        $product = Product::find($id);
        $product->fill($request->all())
            ->update();
        return redirect('/products')->with('status', "Cập nhật sản phẩm thành công");
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
    }
}
