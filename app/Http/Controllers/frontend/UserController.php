<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;

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
}
