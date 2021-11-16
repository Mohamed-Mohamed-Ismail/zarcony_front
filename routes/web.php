<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', function (){
    if(!isset($_COOKIE['token'])) {
        return view('welcome');
    }
    return view('home');

})->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/register', 'AuthController@register')->name('register');

Route::get('/login', 'AuthController@login')->name('login');

Route::get('/profile', 'ProfileController@profile')->name('profile');
Route::get('/transactions', 'TransactionController@getUserTransactions')->name('transactions');
Route::get('/do-payment', 'PaymentController@doPayment')->name('doPayment');
Route::get('/checkout', 'PaymentController@checkout')->name('checkout');
Route::post('/do-payment', 'PaymentController@postPayment')->name('postPayment');
