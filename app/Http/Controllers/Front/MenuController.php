<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $restaurants = Restaurant::all();
        $categories = ProductCategory::all();

        //Tìm theo tên sản phẩm
        $products = Product::where('name', 'like', '%' . $request->get('search') . '%')->get();

        return view('front.menu.index', compact('categories', 'products', 'restaurants'));
    }

    public function show($id)
    {
        $productDetails = Product::findOrFail($id);

        return view('front.menu.show', compact('productDetails'));
    }
}
