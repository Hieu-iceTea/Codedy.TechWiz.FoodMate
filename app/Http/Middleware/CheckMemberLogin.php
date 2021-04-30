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
                if ($request->is('*/login') || $request->is('*/logout') || $request->is('*/register')) {
                    return $next($request);
                }

                if ($request->is('*/account') || $request->is('account/*')) {
                    return redirect()->guest('account/login')->withErrors('Please login to continue...');
                }
            } else { //nếu đã đăng nhập
                if ($request->is('account/*') || $request->is('cart') || $request->is('checkout')) {
                    if (Auth::user()->level != Constant::user_level_customer) {
                        Auth::logout();
                    }
                }
            }
        }

        return $next($request);
    }
}
