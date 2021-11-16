<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;


class TransactionController extends Controller
{
    function __construct()
    {
        if(!isset($_COOKIE['token'])) {
            Redirect::to('/')->send();
        }
    }
    public function getUserTransactions()
    {
        $url =env('BACKEND_DOMAIN').'/api/transactions';
        $user = Http::withToken($_COOKIE['token'])->get($url);

        return view('transactions',[
            "user"=>$user->json()
        ]);
    }
}
