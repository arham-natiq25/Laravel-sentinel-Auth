<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class EmailActivationController extends Controller
{
    public function __invoke($token)
    {
        $userId = Activation::where('code', $token)->first()->user_id;

        // Find the user by ID
        $user = Sentinel::findUserById($userId);

        if ($user) {
            Activation::complete($user, $token);
            Sentinel::login($user);
            return redirect('/dashboard');
        } else {
            dd('error');
        }
    }
}
