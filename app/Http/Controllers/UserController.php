<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show Register/Create Form
    public function create(){
        return view('users/register');
    }

    public function store(){
        $formFields = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:8'
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //create user
        $users = User::create($formFields);

        // Login automatically
        auth()->login($users);

        return redirect('/')->with('success', 'User Created And Logged In');

    }


    //logout
    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('success', 'You Have Logged Out');

    }

    //show login form
    public function login(){
        return view('/users/login');
    }

    //login
    public function authenticate(){
        $formFields = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required|min:8',
        ]);

        if(auth()->attempt($formFields)){
            request()->session()->regenerate();

            return redirect('/')->with('success', 'You Are Now Logged In!');
        }


        return back()->with('danger', 'The Email Or Password Was Incorrect');
    }


}
