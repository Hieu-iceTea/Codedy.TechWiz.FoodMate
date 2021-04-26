<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $product_categories=ProductCategory::all();
        $products=Product::all();
        $restaurants=Restaurant::all();
        return view('front.index',compact('product_categories','products','restaurants'));
    }

    public function service()
    {
        return view('front.service');
    }

    public function faq()
    {
        return view('front.faq');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function about()
    {
        return view('front.about');
    }
}
