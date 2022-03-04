<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('stamp');
});

Route::get('/attendance', function () {
    return view('date');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});
