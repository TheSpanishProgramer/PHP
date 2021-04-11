<?php

namespace App\Http\Controllers;

use App\Category;
use App\Subject;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::where('category_id', null)->get();

        return view('category.show', compact('categories'));
    }

    public function show(Category $category)
    {
        $categories = Category::where('category_id', $category->id)->get();

        if (!isset($categories[0])) {
            $subjects = Subject::where('category_id', $category->id)->get();
            return view('category.show', compact('subjects', 'category'));
        }

        return view('category.show', compact('categories', 'category'));
    }
}
