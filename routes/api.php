<?php

use App\Http\Controllers\Api\AssetController;
use Illuminate\Support\Facades\Route;

Route::get('/api/assets/all', [AssetController::class, 'assets']);
