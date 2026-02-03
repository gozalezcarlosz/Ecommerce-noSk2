<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoAuthController extends Controller
{
    public function index(){
        return view('welcome')->with('title', __('Home'));
    }

    public function dashboard(){
        return view('dashboard')->with('title', 'Dashboard');
    }
}
