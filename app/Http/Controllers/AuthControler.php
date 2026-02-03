<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControler extends Controller
{
    public function login(){
        return view('auth.login')->with('title', __('Auth'));
    }
    public function create(){
        if (User::where('email', request('email'))->exists()){
            return back()->withErrors([
                'email' => 'The provided email is already registered.',
            ]);
        }
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);
        return redirect()->intended('/dashboard')->with('title', 'Dashboard');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->intended('/dashboard')->with('title', 'Dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home')->with('title', __('Home'));
    }
}
