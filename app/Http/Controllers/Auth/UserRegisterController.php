<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        dd($request->all());
    }
}
