<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class PasswordUpdateController extends Controller
{
    public function __invoke(Request $request, $token)
    {
        $request->validate([
            'password'=>'required|min:8|max:20|confirmed'
        ]);

    }
}
