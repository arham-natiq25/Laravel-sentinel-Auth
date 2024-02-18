<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\UserActivationMail;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ResendUserRegisterMailController extends Controller
{
    public function __invoke()
    {
        $userData = Session::get('registered_user');

        if ($userData) {
            $user = Sentinel::findById($userData['id']);
            if ($user) {
                $activation = Activation::where('user_id', $user->id)->first();
                if ($activation) {
                    $activation->delete();
                }
            }
            $newActivation = Activation::create($user);
            Mail::to($user->email)->send(new UserActivationMail($newActivation->code));
            return redirect()->back()->with('status', 'Email Link resent successfully');






        }

        dd($userData);
    }
}
