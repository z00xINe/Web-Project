<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', function () {
    return view('Signup');
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