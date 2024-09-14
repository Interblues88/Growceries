<?php

namespace App\Http\Controllers;

// use App\Models\customer;

use App\Models\cart;
use App\Models\User;
use Illuminate\Http\Request;

class authController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(){
        $validated = request()->validate([
            'name' => 'required|min:2|max:20',
            'phonenumber' => 'required|numeric|min_digits:12|max_digits:12|unique:users,phoneNumber',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:50|confirmed'
        ]);

        $user = User::create([
                'name' => $validated['name'],
                'phoneNumber' => $validated['phonenumber'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password'])
        ]);

        $userId = $user->id;

        cart::create([
            'userId' => $userId,
        ]);

        return redirect()->route('login')->with('success', 'Account has been successfully made, you can login now!');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if(auth()->attempt($validated)){
            request()->session()->regenerate();

            $user = auth()->user();
            if($user->utype == 'admin' || $user->utype == 'courier'){
                return back()->with('error', 'You are not authorized to access this page');
            }

            return redirect()->route('home')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors(
            [
                'email' => 'No matching user found with the provided email and password',
                'password' => 'invalid credential'
            ]
        );
    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }

}
