<?php

use App\Http\Controllers\GeminiAIController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BiodataController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/portofolio', function () {
    return view('portofolio/index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/geminiai', function () {
    return view('geminiai/index');
});

Route::post('/geminiai', [GeminiAIController::class, 'handleChat']);

Route::resource('history_chat', GeminiAIController::class);

Route::group(['prefix' => 'search'], function () {
    Route::get('/', [UserController::class, 'searchUser']);
    Route::get('/{id}', [UserController::class, 'findUser']);
});

// Route::get('/search', [UserController::class, 'searchUser']);
// Route::get('/finduser/{id}', [UserController::class, 'findUser']);

Route::resource('biodata', BiodataController::class);
