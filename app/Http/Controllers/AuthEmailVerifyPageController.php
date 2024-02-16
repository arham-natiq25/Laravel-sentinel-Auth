<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthEmailVerifyPageController extends Controller
{
    function __invoke()
    {
       return view('auth.email_ver');
    }

}
