<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceLogController;
use App\Http\Middleware\AuthenticateOnceWithBasicAuth;
use Illuminate\Support\Facades\Route;

Route::controller(DeviceLogController::class)->group(function () {
    Route::get('/logs/view', 'view')->middleware(AuthenticateOnceWithBasicAuth::class);
    Route::put('/logs/upload', 'upload')->middleware('auth:sanctum');
});

Route::get('/device-token', [AuthController::class, 'token']);
