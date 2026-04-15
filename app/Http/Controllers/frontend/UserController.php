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
}
