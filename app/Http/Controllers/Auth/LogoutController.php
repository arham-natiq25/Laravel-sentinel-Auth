<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke()
    {
        if(Sentinel::check()){
            Sentinel::logout();
            return redirect()->route('auth.login');
        }else{
            return redirect()->back();
        }

    }
}
