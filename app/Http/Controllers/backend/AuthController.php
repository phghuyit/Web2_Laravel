<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        // Make sure to create this view or adjust the path to your actual login blade file
        return view('layouts.backend.pages.login.index');
    }

    public function doLogin(Request $request)
    {
        $username = $request->username;
        $pass= $request->password;

        $data_login=[
            'email' => $username,
            'password' => $pass,
        ];

        if (Auth::attempt($data_login)) {
            // $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.dashboard') -> with('error','Thông tin không chính xác');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
