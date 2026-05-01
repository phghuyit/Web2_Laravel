<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('layouts.backend.pages.login.index');
    }

    public function doLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // 1. Find the active user by email
        $user = User::where('email', $username)->where('status', 1)->first();

        // 2. Verify password manually (same as frontend)
        if ($user && Hash::check($password, $user->password)) {
            if ($user->roles !== 'admin') {
                return back()->with('error', 'Tài khoản không có quyền Admin!');
            }

            // 3. Login the admin guard manually
            Auth::guard('admin')->login($user);
            $request->session()->regenerate();

            dd('Login Success! If you remove this line and still get kicked out, your sessions folder is missing.');

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Thông tin không chính xác hoặc tài khoản đã bị khóa');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
