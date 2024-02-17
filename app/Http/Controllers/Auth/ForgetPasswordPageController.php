<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgetPasswordPageController extends Controller
{
    public function __invoke($token)
    {


        if ($token) {
            return view('auth.forget-password',compact('token'));
        }else
        {
            return redirect('/reset-password')->withErrors(['error' => 'Something went wrong.']);
        }
    }
}
