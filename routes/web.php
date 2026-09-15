<?php

use App\Models\Assets;
use Illuminate\Support\Facades\Route;
use App\Models\User;

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/test', function () {
    return view('pages.test');
});

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/assets', function () {
    return view('pages/assets/index');
});

Route::get('/login', function () {
    return view('pages.auth.login');
});

Route::post('/assets/create', function () {
    //validation...

    Assets::create([
        'asset_name' => request('asset_name'),
        'category' => request('category'),
        'manufacturer' => request('manufacturer'),
        'model' => request('model'),
        'serial_number' => request('serial_number'),
        'vendor' => request('vendor'),
        'status' => request('status'),
        'assigned_to' => request('assigned_to'),
        'location' => request('location'),
        'purchase_date' => request('purchase_date'),
        'warranty_expiration' => request('warranty_expiration'),
    ]);

    return redirect('/assets/create');

    // dd(request()->all());
});

Route::get('/assets/create', function () {
    return view('pages.assets.create');
});

// Route::view('/', 'pages.index');
// Route::view('/login', 'pages.auth.login');
