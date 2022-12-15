<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checkout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->load('carts')->carts->isEmpty() == true)
        {
            return redirect()->back()->with('failed','Bạn chưa có khóa học nào trong giỏ hàng');
        }
        return $next($request);
    }
}
