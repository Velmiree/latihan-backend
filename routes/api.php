<?php

use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return response()->json([
        'status' => 'ok',
        'message' => 'Back end aktif',
        'time' => now()->toIso8601String(),
    ]);
});