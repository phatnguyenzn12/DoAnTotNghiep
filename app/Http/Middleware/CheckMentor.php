<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMentor
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
        if(!auth()->guard('mentor')->user())
        {
            return redirect()->back()->with('failed','Bạn không có quyền truy cập');
        }
        return $next($request);
    }
}
