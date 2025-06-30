<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;   //---//
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

Route::post('/create', [UserController::class, 'store']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', function () {
    return view('Signup');
});


Route::get('/DB_Ops', function () {
    return view('DB_Ops');
});

Route::get('/API_Ops', function () {
    return view('API_Ops');
});

Route::get('/login', function () {
    return view('Login');
});

Route::get('/check_username', function () {

    $username = request('username');
    $existingUser = \App\Models\User::where('user_name', $username)->first();

    if ($existingUser) {
        return "Username already exists.";
    }

    else {
        return "Username is available.";
    }
});

Route::post('/login', function () {
    $user = \App\Models\User::where('user_name', request('username'))->first();

    if ($user && Hash::check(request('password'), $user->password)) {
        Auth::login($user);
        return view('welcome');
    }
    return view('Login');
});