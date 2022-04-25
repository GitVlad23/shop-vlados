<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        $user = auth('web')->user();
        $products = Product::get();

        return view('/main', compact('user', 'products'));
    }

    public function categories()
    {
        $categories = Category::get();

        return view('/categories', compact('categories'));
    }

    public function category($categoryID)
    {
        $category = Category::where('id', $categoryID)->get();
        $products = Product::where('category_id', $categoryID)->get();

        return view('/category', compact('category', 'products'));
    }
}
