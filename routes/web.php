<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/test', function () {
    return view('test', [
        'users' => User::all(),
    ]);
});

Route::get('/', function () {
    return view('index');
});

Route::get('/assets', function () {
    return view('assets');
});

Route::get('/login', function () {
    return view('pages.auth.login');
});

// Route::view('/', 'pages.index');
// Route::view('/login', 'pages.auth.login');
