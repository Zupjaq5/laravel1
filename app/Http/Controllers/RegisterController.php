<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {

        // create the user
       $attributes = request()->validate([
            'name'=>'required|max:255',
            //'username'=>'required|max:255|min:3|unique:users,username',   // unique:tabela,kolumna
            'username'=>['required','min:3','max:255',Rule::unique('users','username')],
            'email'=>['required','email','max:255',Rule::unique('users','email')],
            'password'=>'required|min:7|max:255'
        ]);

       // $attributes['password'] = bcrypt($attributes['password']); szyfrowanie hasla (dodano osobna metode w klasie modelu user setPasswordAttribute)
        User::create($attributes);



        return redirect('/')->with('success','Your account has been created');
    }

}
