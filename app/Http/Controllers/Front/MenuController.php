<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Admin\CategoryController;
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
        $restaurant_id = $request->get('restaurant_id');
        $search = $request->get('search');
        $tag = $request->get('tag');

        //Lấy danh sách category_id đang active, sau đó lấy danh sách sản phẩm có category là active:
        $category_active_ids = array_unique(array_column(ProductCategory::where('deleted', false)->get()->toArray(), 'id'));
        $products = Product::whereIn('product_category_id', $category_active_ids)->get();
        if($search != null){
            //Tìm theo tên
            $products = $products->where('name', 'like', '%' . $search . '%');
        }


        //restaurant_id
        if ($restaurant_id != null) {
            $products = $products->where('restaurant_id', $restaurant_id);
        }

        //Tìm theo tag
        if ($tag != null) {
            $products = $products->whereIn('tag', $tag);
        }

//        $products = $products->orderBy('id', 'desc')->get();

        $categories = ProductCategory::whereIn('id', array_unique(array_column($products->toArray(), 'product_category_id')))->get();
        $restaurant_name = Restaurant::find($restaurant_id)->name ?? '';

        return view('front.menu.index', compact('categories', 'products', 'restaurant_name'));
    }

    public function show($id)
    {
        $productDetails = Product::findOrFail($id);

        return view('front.menu.show', compact('productDetails'));
    }
}
