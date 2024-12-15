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

    /**
     * Handle an incoming authentication request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * This method attempts to authenticate the user using the provided email and password.
     * If authentication fails, a validation exception is thrown with a generic error message
     * to avoid disclosing whether the email or password was incorrect.
     *
     * Upon successful authentication, the session ID is regenerated to prevent session fixation attacks.
     * The user is then redirected to the intended URL or the '/listing' route.
     */
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
                'email' => 'Login failed. Please check your credentials.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/listing');
    }

    /**
     * Log the user out of the application and invalidate the session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('listing.index');
    }
}
