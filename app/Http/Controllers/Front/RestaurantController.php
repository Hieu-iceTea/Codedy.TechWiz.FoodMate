<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return view('front.restaurant.index');
    }

    public function show($id)
    {
        return view('front.restaurant.show');
    }
}
