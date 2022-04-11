<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;

Route::middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'index']);
    Route::post('/attendance/start', [AttendanceController::class, 'start']);
    Route::post('/attendance/end', [AttendanceController::class, 'end']);
    Route::post('/rest/start', [RestController::class, 'start']);
    Route::post('/rest/end', [RestController::class, 'end']);
    Route::get('/attendance', [AttendanceController::class, 'date']);
});

require __DIR__.'/auth.php';
