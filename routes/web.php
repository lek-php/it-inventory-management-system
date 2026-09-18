<?php

use App\Models\Asset;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

//API Routes
Route::get('/api/assets/all', function () {
    return Asset::all();
});






Route::get('/', function () {
    return view('pages.index');
});

Route::get('/assets', function () {
    $byCategoryCount = Asset::select('status')->get()->groupBy('status')->map->count();
    $AssetsCount = Asset::count();

    return view('pages.assets.index', compact('byCategoryCount', 'AssetsCount'));
});

Route::get('/login', function () {
    return view('pages.auth.login');
});

Route::post('/assets/create', function () {
    //validation...
    request()->validate([
        'asset_name' => 'required',
        'category' => 'required',
        'tag' => 'required',
        'manufacturer' => 'required',
        'model' => 'required',
        'serial_number' => 'required',
        'vendor' => 'required',
        'status' => 'required',
        'assigned_to' => 'required',
        'location' => 'required',
        'purchase_date' => 'required|date',
        'warranty_expiration' => 'required|date',
    ]);

    Asset::create([
        'asset_name' => request('asset_name'),
        'category' => request('category'),
        'tag' => request('tag'),
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
