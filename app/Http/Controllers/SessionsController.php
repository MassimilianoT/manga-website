<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function create()
    {

        return view('login');
    }


    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect()->back()->with('success', 'Welcome Back!');
        }

        return back()
            ->withInput($attributes)
            ->withErrors([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }


    public function destroy()
    {
        auth()->logout();

        return redirect()->back()->with('success', 'Goodbye!');
    }
}
