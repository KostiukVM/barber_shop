<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/services', [ApiController::class, 'services']);
Route::get('/staff', [ApiController::class, 'staff']);
Route::get('/schedule', [ApiController::class, 'schedule']);

Route::post('/set-entity', [ApiController::class, 'saveStep']);
