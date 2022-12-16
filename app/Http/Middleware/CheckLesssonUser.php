<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLesssonUser
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

        if (
            auth()->user()->load('lesson_user')
            ->lesson_user->isEmpty() == true
        ) {
            return redirect()->back()->with('failed', 'bạn chưa học xong bài học');
        }

        if (!$request->route()->parameter('course')) {
            return redirect()->back()->with('failed', 'Thiếu khóa học');
        }


        return $next($request);
    }
}
