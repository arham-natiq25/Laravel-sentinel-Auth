<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordLinkMail;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthResetPasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = Sentinel::findByCredentials(['email' => $request->input('email')]);
        if ($user) {
            $reminder = Sentinel::getReminderRepository()->create($user);

            Mail::to($user->email)->send(new ResetPasswordLinkMail($reminder->code));
            return redirect()->back()->with('status', 'Password reset link sent successfully.');
        } else {
            return redirect()->back()->withErrors(['email' => 'User not found.']);
        }
    }
}
