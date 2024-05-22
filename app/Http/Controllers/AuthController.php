<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login');
    }

    public function store(Request $request)
    {
        if (!Auth::attempt(
            $request->validate([
                'email' => 'required', 'string', 'email',
                'password' => 'required', 'string'
            ]),
            true
        )) {
            throw ValidationException::withMessages([
                //TODO: For PF under security "information disclosure".
                //TODO: When the authentication fails, we should not provide the user with too much detail about what went wrong. weather it was the email or the password that was incorrect, beacuse the attacker can use this info to check if the email is correct and then try to guess the password.
                'email' => 'Invalid credentials.',
                'password' => 'Invalid credentials.'
            ]);
        }

        //TODO: For PF under security "Session Security".
        //TODO: regeneratig the session id after a successful login is a good practice to prevent session fixation attacks, where an attacker can steal a session id and use it to impersonate the user.
        $request->session()->regenerate();

        return redirect()->intended('/listing');
    }



    public function destroy()
    {
    }
}
