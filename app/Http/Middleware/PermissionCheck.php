<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PermissionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {

        $allowRoles = explode('|', $role);
        if (Auth::guard('admin')->check() == true) {
            if (!Auth::guard('admin')->user()->remember_token == null) {
                return redirect()->route('admin.login')->with('failed', 'Tài khoản chưa xác thực email');
            }
            elseif (in_array(Auth::guard('admin')->user()->PermissionCheck(), $allowRoles)) {
                return $next($request);
            }
        }
        if (Auth::guard('mentor')->check() == true) {
            if (!Auth::guard('mentor')->user()->remember_token == null) {
                return redirect()->route('mentor.login')->with('failed', 'Tài khoản chưa xác thực email');
            }
            // Check quyền thêm mới khóa học
            elseif (in_array(Auth::guard('mentor')->user()->PermissionCheck(), $allowRoles)) {
                return $next($request);
            }
        }
        if (Auth::guard('censor')->check() == true) {
            if (!Auth::guard('censor')->user()->remember_token == null) {
                return redirect()->route('censor.login')->with('failed', 'Tài khoản chưa xác thực email');
            }
            elseif (in_array(Auth::guard('censor')->user()->PermissionCheck(), $allowRoles)) {
                return $next($request);
            }
        }
        if (Auth::guard('web')->check() == true) {
            if (!Auth::guard('web')->user()->remember_token == null) {
                return redirect()->route('auth.login')->with('failed', 'Tài khoản chưa xác thực email');
            }
            if (in_array(Auth::guard('web')->user()->PermissionCheck(), $allowRoles)) {
                return $next($request);
            }
        }

        return redirect()->route('client');
    }
}
