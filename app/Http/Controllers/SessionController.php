<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;


class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success','Goodbye!');
    }

    public function create()
    {

        return view('session.create');
    }

    public function store()
    {
        //validate the request
      $attributes = request()->validate([
            'email'=>'required',  //|exists:users,email
            'password'=>'required'
        ]);

        // attempt to authenticate and log in the user
        // based on the provided credentials
        if (auth()->attempt($attributes))
        {
        // session fixation (zapobiega przechwytywaniu danych)
            session()->regenerate();
        // redirect with a success flash message
            return redirect('/')->with('success','Welcome Back!');
        }

        // auth failed.
       /* return back()
            ->withInput()
            ->withErrors(['email'=>'Your provided credentials could not be verified']); */

        throw ValidationException::withMessages([
            'email'=>'Your provided credentials could not be verified'
        ]);
    }
}
