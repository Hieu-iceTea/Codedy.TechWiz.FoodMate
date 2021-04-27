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
        if (!$request->is('*/admin/*')) {

            //Nếu chưa đăng nhập:
            if (Auth::guest()) {
                if ($request->is('*/account') || $request->is('*/my-order')) {
                    return redirect()->guest('account/login');
                }
            } else { //nếu đã đăng nhập
                if ($request->is('*/profile') || $request->is('*/checkout') || $request->is('*/my-order')) {
                    if (Auth::user()->level != Constant::user_level_customer) {
                        Auth::logout();

                        return redirect()->back();
                    }
                }
            }
        }

        return $next($request);
    }
}
