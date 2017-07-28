<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Mail\Welcome;

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

        // Send email to the user
        \Mail::to($user)->send(new Welcome($user));

        // Redirect
        //return redirect('/');
        return redirect()->home();
    }
}
