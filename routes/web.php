<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ApiController;




//TEST
Route::get('/test', [ApiController::class, 'test']);

//API Routes
Route::get('/api/assets/all', [ApiController::class, 'assets']);
Route::get('/api/users/all', [ApiController::class, 'users']);
Route::get('/api/departments/all', [ApiController::class, 'departments']);



// LOGIN ROUTES
Route::get('/login', function () {
    return view('pages.auth.login');
});



// INDEX ROUTES
Route::get('/', function () {
    return view('pages.index');
});



// ASSETS ROUTES
Route::get('/assets', [AssetController::class, 'index'])->name('pages.assets.index');
Route::post('/assets/create', [AssetController::class, 'insert'])->name('pages.assets.create');
Route::get('/assets/create', [AssetController::class, 'create'])->name('pages.assets.create');
Route::get('/assets/asset/{id}', [AssetController::class, 'show'])->name('pages.assets.show');
Route::post('/assets/update/{id}', [AssetController::class, 'update'])->name('pages.assets.edit');
Route::get('assets/asset/{id}/edit', [AssetController::class, 'edit'])->name('pages.assets.edit');
Route::post('/assets/asset/{id}/assign', [AssetController::class, 'assign']);



// USERS ROUTES
Route::get('/users', [UserController::class, 'index'])->name('pages.users.index');
Route::post('/users/create', [UserController::class, 'insert'])->name('pages.users.create');
Route::get('/users/create', [UserController::class, 'create'])->name('pages.users.create');
