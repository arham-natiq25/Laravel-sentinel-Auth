<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterationRequest;
use App\Mail\UserActivationMail;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as FacadesSession;

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



        $activation = Activation::create($user);


        FacadesSession::put('registered_user', [
            'id'         => $user->id,
            'first_name' => $user->first_name,
            'last_name'  => $user->last_name,
            'email'      => $user->email,
        ]);

        if ($user) {
           Mail::to($user->email)->send(new UserActivationMail($activation->code));
           return redirect()->route('auth.email.verify');
        }
    }
}
