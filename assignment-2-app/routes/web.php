<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;   //---//

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

Route::get('/create', function () {
    $user = new \App\Models\User();
    $user->full_name = request('name');
    $user->user_name = request('user');
    $user->email = request('email');
    $user->phone_number = request('pnum');
    $user->whatsapp_number = request('wnum');
    $user->password = bcrypt(request('pass'));
    $user->address = request('address');
    $user->original_file_name = request('image');
    $uniqueFileName = uniqid('img_', true) . '.' . pathinfo($user->original_file_name, PATHINFO_EXTENSION);
    $user->user_image = $uniqueFileName;
    request()->file('image')->move(public_path('uploads'), $uniqueFileName);
    $user->save();
    return 'User created successfully!';
});
