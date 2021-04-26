<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $productTag = Constant::$product_tags;
        $restaurants = Restaurant::all();
        $categories = ProductCategory::all();
        //Tìm theo tên sản phẩm
        if($request->tag != null){
            $products = Product::WhereIn('tag',$request->tag)
                ->where('name', 'like', '%' . $request->get('search') . '%')
                ->orWhere('restaurant_id',$request->get('search'))
                ->get();
        }else{
            $products = Product::where('name', 'like', '%' . $request->get('search') . '%')
                ->orWhere('restaurant_id',$request->get('search'))
                ->get();
        }
        return view('front.menu.index', compact('categories', 'products', 'restaurants','productTag'));
    }

    public function show($id)
    {
        $productDetails = Product::findOrFail($id);

        return view('front.menu.show', compact('productDetails'));
    }
}
