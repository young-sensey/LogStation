<?php

use App\Http\Controllers\DeviceLogController;
use Illuminate\Support\Facades\Route;

Route::controller(DeviceLogController::class)->group(function () {
    Route::get('/logs/view', 'view');
    Route::put('/logs/upload', 'upload');
});
