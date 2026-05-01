<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('layouts.frontend.pages.user.login');
    }

    public function signup()
    {
        return view('layouts.frontend.pages.user.signup');
    }

    public function forgot()
    {
        return view('layouts.frontend.pages.user.forgotpass');
    }

    public function doLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // Initial query arguments: only active users
        $args = [
            ['status', '=', 1],
        ];

        // Check if the input is an email or a username
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $args[] = ['email', '=', $username];
        } else {
            $args[] = ['username', '=', $username];
        }

        // Find the user in the database
        $user = User::where($args)->first();

        if ($user != null) {
            // Verify the hashed password
            if (Hash::check($password, $user->password)) {
                Auth::login($user); // Tell Laravel the user is authenticated (Required for 'auth' middleware)
                session()->put('user_site', $user);
                $request->session()->regenerate();

                return redirect()->route('site.home')->with('success', 'Đăng nhập thành công');
            } else {
                return back()->with('error', 'Mật khẩu không đúng')->withInput($request->except('password'));
            }
        } else {
            return back()->with('error', 'Tên đăng nhập hoặc email không tồn tại')->withInput($request->except('password'));
        }
    }

    public function doRegister(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'username' => 'required|string|max:255|unique:users',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6',
        // ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 1,
            'phone' => $request->phone,
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công. Vui lòng đăng nhập.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session()->forget('user_site');

        return redirect()->route('site.home')->with('success', 'Đăng xuất thành công');
    }

    public function profile()
    {
        return view('layouts.frontend.pages.user.profile', ['user' => Auth::user()]);
    }
}
