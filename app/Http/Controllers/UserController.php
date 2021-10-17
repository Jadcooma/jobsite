<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:5',
            'username' => 'required|max:255|min:5|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255'
        ]);

        // encryption of password with mutator method of User.php

        $user = User::create($attributes);

        auth()->login($user);

        session()->flash('success', 'U werd succesvol geregistreerd als gebruiker');

        return redirect('/');
    }
}
