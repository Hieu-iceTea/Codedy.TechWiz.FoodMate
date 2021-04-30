<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->search;
        $restaurants = Restaurant::where('name', 'like', '%' . $keyword . '%')
            ->orWhere('address', 'like', '%' . $keyword . '%')
            ->get();

        return view('front.restaurant.index', compact('restaurants'));
    }

    public function show($id, Request $request)
    {
        $restaurant = Restaurant::findOrFail($id);

        if ($request->slug == null) {
            return redirect('restaurant/' . $id . '/' . Str::slug($restaurant->name) . '.html');
        }

        $restaurant_id = $id;
        $search = $request->get('search');
        $tag = $request->get('tag');

        //Lấy danh sách category_id đang active, sau đó lấy danh sách sản phẩm có category là active:
        //$category_active_ids = array_unique(array_column(ProductCategory::where('active', true)->get()->toArray(), 'id'));
        //$products = Product::whereIn('product_category_id', $category_active_ids);

        //Tìm theo tên
        //$products = $products->where('name', 'like', '%' . $search . '%');

        $products = Product::where('name', 'like', '%' . $search . '%');

        //restaurant_id
        if ($restaurant_id != null) {
            $products = $products->where('restaurant_id', $restaurant_id);
        }

        //Tìm theo tag
        if ($tag != null) {
            $products = $products->whereIn('tag', $tag);
        }

        $products = $products->orderBy('id', 'desc')->get();

        $categories = ProductCategory::whereIn('id', array_unique(array_column($products->toArray(), 'product_category_id')))->get();
        $restaurant_name = Restaurant::find($restaurant_id)->name ?? '';

        return view('front.restaurant.show',compact('restaurant', 'categories', 'products', 'restaurant_name'));
    }
}
