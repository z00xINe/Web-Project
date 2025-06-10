<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;   //---//
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

Route::get('/register', [UserController::class, 'create']);                        //---//
Route::post('/register', [UserController::class, 'store'])->name('users.store');   //---//


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

Route::post('/create', function () {
    $user = new \App\Models\User();
    $user->full_name = request('name');
    $user->user_name = request('user');
    $user->email = request('email');
    $user->phone_number = request('pnum');
    $user->whatsapp_number = request('wnum');
    $user->password = Hash::make(request('pass'));
    $user->address = request('address');
    $user->original_file_name = request('image');
    $uniqueFileName = uniqid('img_', true) . '.' . pathinfo($user->original_file_name, PATHINFO_EXTENSION);
    $user->user_image = $uniqueFileName;
    request()->file('image')->move(public_path('uploads'), $uniqueFileName);
    $user->save();
    return view('login');
});

Route::post('/login', function () {
    $user = \App\Models\User::where('user_name', request('username'))->first();

    if ($user && Hash::check(request('password'), $user->password)) {
        Auth::login($user);
        return view('welcome');
    }
    return view('Login');
});