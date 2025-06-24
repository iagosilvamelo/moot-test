<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['handle_exception'])->group(function () {

    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
    });

});
