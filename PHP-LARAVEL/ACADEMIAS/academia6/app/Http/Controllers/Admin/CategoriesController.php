<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::whereNull('category_id')->get();

        return view('admin.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (isset($request->category_id)) {
            $this->validate($request, [
                'name' => 'required|string|max:150',
                'category_id' => 'required|exists:categories,id'
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required|string|max:150',
                'category_id' => ''
            ]);
        }

        Category::create($request->all());

        return redirect()->back()->with('success', 'Se ha creado el curso con exito');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Se ha eliminado el curso con exito');
    }
}
