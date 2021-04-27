<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $product_categories=ProductCategory::all();
        $products=Product::all();
        $restaurants=Restaurant::all();
        $feedbacks=Feedback::where('rating','>=',4)->get();
//        dd($feedbacks->toArray());
//        $feedbacks=DB::select('select * from `codedy.techwiz.foodmate`.feedbacks where rating >=4 order by rating desc limit 2');


        return view('front.index',compact('product_categories','products','restaurants','feedbacks'));
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
