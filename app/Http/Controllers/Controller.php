<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login() {
        if (auth()->check()){
            // return redirect()->route('app')->with('success', 'You are already logedin');
            return "HI";
        } else {
            return view('welcome');
        }
    }

    public function register(){
        if (auth()->check()){
            // return redirect()->route('app')->with('success', 'You are already logedin to your account');
        } else {
            return view('register');
        }
    }
}
