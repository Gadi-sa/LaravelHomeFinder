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
            true // is used to remember the user in the session and create a session cookie.
        )) {
            throw ValidationException::withMessages([
                //TODO: For PF under security "information disclosure".
                //TODO: When the authentication fails, we should not provide the user with too much detail about what went wrong. weather it was the email or the password that was incorrect, beacuse the attacker can use this info to check if the email is correct and then try to guess the password.

                'email' => 'Login failed. Please check your credentials.',
                'password' => 'Login failed. Please check your credentials.'
            ]);
        }

        //TODO: For PF under security "Session Security".
        //TODO: regeneratig the session id after a successful login is a good practice to prevent session fixation attacks, where an attacker can steal a session id and use it to impersonate the user.

        $request->session()->regenerate();

        return redirect()->intended('/listing');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        //TODO: For PF under security "Session Security".
        //TODO: After logging out, we should invalidate the session to prevent session fixation attacks, where an attacker can steal a session id and use it to impersonate the user.

        $request->session()->invalidate();

        //TODO: For PF under security "CSRF Protection".
        //TODO: After logging out, we should regenerate the CSRF token to prevent CSRF attacks, where an attacker can trick the user into performing actions on the website without their consent.

        //Todo: Regenerate the CSRF token
        // To prevent CSRF attacks laravel provides a CSRF token that is used to verify that the authenticated user is the one actually making the requests to the application. and it compare the token in the request with the token stored in the session are the same. so if the token in the request is not the same as the token stored in the session, the request will be rejected.
        //  the other purpose of using laravel with
        // Laravel prevents CSRF attacks by generating a CSRF "token" for every active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.
        $request->session()->regenerateToken();

        return redirect()->route('listing.index');
    }
}
