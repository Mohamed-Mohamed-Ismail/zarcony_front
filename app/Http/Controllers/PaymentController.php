<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\PostPaymentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    function __construct()
    {
        if(!isset($_COOKIE['token'])) {
            Redirect::to('/')->send();
        }
    }
    public function doPayment()
    {
        $url =env('BACKEND_DOMAIN').'/api/users';
        $users = Http::withToken($_COOKIE['token'])->get($url);

        return view('payment',[
            "users"=>$users
        ]);
    }

    public function checkout(CheckoutRequest $request)
    {

        return view('checkout',[
            "recipient_id"=>$request->recipient_id,
            "amount"=>$request->amount

        ]);
    }

    public function postPayment(Request $request)
    {
        $url =env('BACKEND_DOMAIN').'/api/payment';
        $response = Http::withToken($_COOKIE['token'])->post($url,[
            "recipient_id"=>$request->recipient_id,
            "amount"=>$request->amount,
            "card_number"=>$request->card_number,
            "expiry_date"=>$request->expiry_date,
            "CVC"=>$request->CVC,
            "card_holder_name"=>$request->card_holder_name,
        ]);

        return view('response',[
            "response"=>$response
        ]);
    }
}
