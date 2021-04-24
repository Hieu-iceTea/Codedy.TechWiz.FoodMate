<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        $products = Product::all();

        return view('front.menu.index', compact('categories', 'products'));
    }

    public function show($id)
    {
        $productDetails = Product::findOrFail($id);

        return view('front.menu.show', compact('productDetails'));
    }
}
