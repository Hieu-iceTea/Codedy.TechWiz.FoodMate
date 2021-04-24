<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return view('front.menu.index');
    }

    public function show($id)
    {
        $productDetails = Product::findOrFail($id);

        return view('front.menu.show', compact('productDetails'));
    }
}
