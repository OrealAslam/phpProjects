<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/', [TestController::class, 'submit'])->name('submit');

Route::get('set-cookie', [TestController::class, 'index']);
// Route::get('/delete', [TestController::class, 'destroy_cookie']);

Route::get('get-cookie', [TestController::class, 'get_cookie']);
