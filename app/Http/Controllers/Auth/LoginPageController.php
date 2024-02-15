<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginPageController extends Controller
{
    public function __invoke()
    {
        return view('auth.login');
    }
}
