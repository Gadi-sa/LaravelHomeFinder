<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    /**
     * Show the form for creating a new user account.
     */

    public function create()
    {
        return inertia('UserAccount/Create');
    }

    /**
     * Store a newly created user account in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(Request $request)
    {
        $user = User::create($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]));

        Auth::login($user);

        return redirect()->route('listing.index')
            ->with('success', 'Welcome ' . $user->name . ', your account has been created successfully!');
    }
}
