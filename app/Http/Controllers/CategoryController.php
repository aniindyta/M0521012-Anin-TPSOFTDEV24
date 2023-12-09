<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::all();
        return view('categories', ['category' => $category]);
    }

    public function addcategory() {
        return view('categoryAdd');
    }

    function storecategory(Request $request) {
        $validated = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        category::create($validated);
        return redirect('categories');
    }

    function editcategory($id) {
        $category = Category::where('id', $id)->first();
        return view('categoryEdit', ['category' => $category]);
    }

    function updatecategory(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $category = Category::where('id', $id)->first();
        $category->update($request->all());
        return redirect('categories');
    }

    function deletecategory($id) {
        $category = Category::where('id', $id)->first();
        $category->delete();
        return redirect('categories');
    }
}
