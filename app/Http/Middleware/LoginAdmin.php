<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if( !Auth::guard('admin')->check()){
            return redirect()->route('admin.login')->with('error','Vui lòng đăng nhập!');
        }

        $user = Auth::guard('admin')->user();

        if($user->roles!=='admin'){
            Auth::guard('admin')->logout();
            return redirect()->route('admin.login')-> with('error','Bạn không có quyền truy cập!');
        }
        return $next($request);
    }
}
