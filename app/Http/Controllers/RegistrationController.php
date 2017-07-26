<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
    //
    public function create() {
        return view('registration.create');
    }

    public function store() {
        
        // Validate form
        $this->validate(request(), [

            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
        
        // Create and save the user
        $user = User::create(request(['name', 'email', 'password']));

        // Sign in
        auth()->login($user);

        // Redirect
        //return redirect('/');
        return redirect()->home();
    }
}
