<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
   public function __invoke(LoginRequest $request)
   {
    $credentials = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    $user = Sentinel::findByCredentials($credentials);

        if ($user) {
            // Check activation status
            if (Activation::completed($user)) {
                // Authenticate the user
                if (Sentinel::authenticate($credentials)) {
                    // Authentication successful
                    if ($user->inRole('admin')) {
                        return redirect()->intended('/admin/dashboard'); // Redirect to the admin dashboard
                    } else {
                        return redirect()->intended('/dashboard'); // Redirect to the user dashboard
                    }
                } else {
                    // Authentication failed
                    return redirect()->back()->withInput()->withErrors(['login' => 'Invalid email or password']);
                }
            } else {
                // User is not activated
                return redirect()->back()->withInput()->withErrors(['login' => 'Account not activated.']);
            }
        } else {
            // User not found
            return redirect()->back()->withInput()->withErrors(['login' => 'Invalid email or password']);
        }

   }
}
