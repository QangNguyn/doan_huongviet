<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;


class CategoriesController extends Controller
{
    public function index()
    {
        $category = Category::paginate(config('const.PER_PAGE'));
        return view('Admin.category.index', compact('category'));
    }
    public function add()
    {

        $categories = Category::where('parent_id', 0)->get();
        return view('Admin.category.add', compact('categories'));
    }
    public function insert(CategoryRequest $request)
    {
        $category = new Category;
        $category->fill($request->all())
            ->save();
        return back()->with('status', "Tạo danh mục thành công");
    }

    public function edit($id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $category = Category::find($id);
        return view('Admin.category.edit', compact('category', 'categories'));
    }

    public function update(UpdateCategoryRequest $request,  $id)
    {
        $category = Category::find($id);
        $category->fill($request->all())
            ->update();
        return redirect('/categories')->with('status', "Cập nhật danh mục thành công");
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/categories');
    }
}
