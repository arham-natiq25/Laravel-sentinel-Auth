<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterationRequest;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    //
    public function __invoke(RegisterationRequest $request)
    {

       $user =  Sentinel::register([

            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        if ($user) {
           dd('User created');
        }else
        {
            dd('not created');
        }
    }
}
