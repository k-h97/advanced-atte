<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('stamp');
    });
    Route::get('/attendance', function () {
        return view('date');
    });
});

require __DIR__.'/auth.php';
