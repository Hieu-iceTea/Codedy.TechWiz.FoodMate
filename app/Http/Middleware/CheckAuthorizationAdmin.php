<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuthorizationAdmin
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
        //Nếu tài khoản là Staff thì không được dùng user & restaurant
        if (Auth::check()) {
            if (\Illuminate\Support\Facades\Auth::user()->level == \App\Utilities\Constant::user_level_staff) {
                if ($request->is('*/user') || $request->is('*/restaurant')) {
                    return redirect('admin');
                }
            }
        }

        return $next($request);
    }
}
