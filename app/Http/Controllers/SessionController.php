<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.login');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)) {
            return redirect('/')->with('success', 'U bent succesvol aangemeld');
        }

        throw ValidationException:: withMessages([
            'username' => 'Geen gebruiker met deze gebruikersnaam gevonden'
        ]);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'U werd succesvol afgemeld');
    }
}