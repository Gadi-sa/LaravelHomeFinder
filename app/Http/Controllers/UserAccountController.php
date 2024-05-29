<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;//this is used to get the request data from the form submission and validate it before storing it in the database.in simple words its alot like $_POST in php. when using  inertia with laravel and vue js, we use the request object to get the form data from the vue component and validate it using the validate method. is used to get the request data from the form submission and validate it before storing it in the database. in simple words, it's a lot like $_POST in php. when using inertia with laravel and vue js, we use the request object to get the form data from the vue component and validate it using the validate method.
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
        //TODO: For PF under security "Validate/Sanitize/authenticate/CSRF Protect the request data before storing it in the database".
        //TODO: when creating a new user account, we should validate the request data to ensure that it is safe to store in the database. we should also sanitize the data to prevent XSS attacks, where an attacker can inject malicious code into the website.


        //TODO: Password should be hashed before storing it in the database to prevent password leaks in case the database is compromised. Laravel provides a built-in password hashing mechanism that uses bcrypt to securely hash passwords. when using laravel 11, the password is automatically hashed in the User model using the data casting feature.

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
