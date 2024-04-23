<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register form
    public function create(){
return view("user.register");
    }

    //show login form
    public function login(){
        return view("user.login");
            }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => 'required',
            //below needs to be unique to the users table and email field
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password'=> ['required', 'confirmed', 'min:6']
            //'password' => 'required|confirmed|min:6'
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        return redirect('/')->with('message','user created and logged in');


    }

    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
                        
            'email' => ['required', 'email'],
            'password'=> 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
        
    }


