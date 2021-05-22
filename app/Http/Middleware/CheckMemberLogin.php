<?php

namespace App\Http\Middleware;

use App\Utilities\Constant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckMemberLogin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!($request->is('admin') || $request->is('admin/*'))) {
            //Nếu chưa đăng nhập:
            if (Auth::guest()) {

                //Nếu chưa đăng nhập mà vào login, logout hoặc register thì cho qua
                if ($request->is('*/login') || $request->is('*/logout') || $request->is('*/register')) {
                    return $next($request);
                }

                if ($request->is('*/login') || $request->is('*/logout') || $request->is('*/register') || $request->is('*/reset-password')) {
                    return $next($request);
                }

                if ($request->is('*/account') || $request->is('account/*')) {
                    return redirect()->guest('account/login')->withErrors('Please login to your account to continue...');
                }
            } else { //nếu đã đăng nhập

                //Nếu đã đăng nhập mà vẫn vào login thì chuyển hướng
                if ($request->is('*/login')) {
                    return redirect('account/profile');
                }

                if ($request->is('cart') || $request->is('checkout')) {
                    if (Auth::user()->level != Constant::user_level_customer) {
                        Auth::logout();
                    }
                }

                if ($request->is('account/*')) {
                    if (Auth::user()->level != Constant::user_level_customer) {
                        Auth::logout();
                        return redirect('account/login')->withErrors('Before that, you logged in to the administrator account. Please login to the customer account to visit the website for customers.');
                    }
                }
            }
        }

        return $next($request);
    }
}
