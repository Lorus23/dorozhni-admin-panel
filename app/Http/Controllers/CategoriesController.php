<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $data['categories'] = $category;
        return view('category.index', $data);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);
        Category::storeCategory($request->category_name);
        return redirect()->route('categories');
    }

    public function delete($category_id, Request $request)
    {
        Category::destroy($category_id);
        return redirect()->route('categories');
    }

    public function edit($category_id)
    {
        $data['category'] = Category::find($category_id);
        return view('category.edit', $data);
    }

    public function update($category_id, Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required',
        ]);
        Category::find($category_id)->update($request->all());
        return redirect()->route('categories');
    }
}
