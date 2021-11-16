<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AuthController extends Controller
{
    public function login()
    {
        if(isset($_COOKIE['token'])) {
           return redirect('/home');
        }
        return view('auth.login');
    }

    public function register()
    {
        if(isset($_COOKIE['token'])) {
            return redirect('/home');
        }
        return view('auth.register');
    }

}
