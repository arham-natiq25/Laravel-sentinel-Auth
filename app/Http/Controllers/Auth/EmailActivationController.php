<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class EmailActivationController extends Controller
{
    public function __invoke($token)
    {
        $activation = Activation::where('code', $token)->first();

        if(!$activation){
            return redirect()->route('auth.email.verify')->with('status', 'Email Link Expires');
        }

        if ($activation) {

            $userId = $activation->user_id;

        if (!$userId) {
           dd('error');
        }
        // Find the user by ID
        $user = Sentinel::findUserById($userId);

        if ($user) {
            Activation::complete($user, $token);
            FacadesSession::forget('registered_user');
            Sentinel::login($user);
            return redirect('/dashboard');
        } else {
            dd('error');
        }

    }
    }
}
