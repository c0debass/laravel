<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class AuthManager extends Controller
{
    function login(){
        return view("auth.login");

    }

    public function loginPost(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        request()->session()->regenerate();

        return redirect()->intended(route('home'));
    }

    function logout(){
        Auth::logout();
        return redirect(route("home"));
    }

    function register(){
        return view("auth.register");
    }

    function registerPost(){
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // if($user->save()){
        // return redirect()->intended(route("login"))
        //     ->with("success", "Registration successful");
        // }
        // return redirect()->intended(route("register"))
        //     ->with("error", "Something went wrong");
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $user = User::create($attributes);
        Auth::login($user);
        return redirect(route("home"));
    }
}