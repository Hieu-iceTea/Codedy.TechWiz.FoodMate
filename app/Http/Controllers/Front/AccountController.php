<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('front.account.my-order.index');
    }

    public function show($id)
    {
        return view('front.account.my-order.show');
    }
}
