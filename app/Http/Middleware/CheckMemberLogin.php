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
            //Nếu vào trang my-order:
            if ($request->is('*/my-order')) {
                if (Auth::guest()) {
                    return redirect()->guest('account/login');
                }
            }

            if ($request->is('*/account') || $request->is('*/checkout') || $request->is('*/my-order')) {
                if (Auth::user()->level != Constant::user_level_customer) {
                    Auth::logout();

                    return redirect()->guest('');
                }
            }
        }

        return $next($request);
    }
}
