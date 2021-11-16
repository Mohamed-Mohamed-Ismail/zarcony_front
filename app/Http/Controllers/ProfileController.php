<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    function __construct()
    {
        if(!isset($_COOKIE['token'])) {
            Redirect::to('/')->send();
        }
    }

    public function profile()
    {
        $url =env('BACKEND_DOMAIN').'/api/profile';
        $user = Http::withToken($_COOKIE['token'])->get($url);

        return view('profile',[
            "user"=>$user
        ]);
    }
}
