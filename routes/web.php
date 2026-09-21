<?php

use App\Models\Asset;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

//API Routes
Route::get('/api/assets/all', function () {
    return Asset::all();
});

Route::get('/api/users/all', function () {
    return User::all();
});



// LOGIN ROUTES
Route::get('/login', function () {
    return view('pages.auth.login');
});

// INDEX ROUTES
Route::get('/', function () {
    return view('pages.index');
});

// ASSETS ROUTES
Route::get('/assets', function () {
    $byCategoryCount = Asset::select('status')->get()->groupBy('status')->map->count();
    $AssetsCount = Asset::count();

    return view('pages.assets.index', compact('byCategoryCount', 'AssetsCount'));
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

    // Create a new asset record in the database
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

    // Redirect to the asset creation page after successful submission
    return redirect('/assets/create');
});

Route::get('/assets/create', function () {
    return view('pages.assets.create');
});

// USERS/ PEOPLE ROUTES
Route::get('/users', function () {
    return view('pages.users.index');
});

Route::post("/users/create", function () {
    //validation...
    if (request()->has('password')) {
        request()->validate([
            'employee_id' => 'required',
            'department' => 'required',
            'phone' => 'regex:/^(09\d{9}|\+639\d{9})$/',
            'email' => 'required|email',
            'position' => 'required',
            'password' => 'required|min:8',
        ]);
    } else {
        request()->validate([
            'employee_id' => 'required',
            'department' => 'required',
            'phone' => 'regex:/^(09\d{9}|\+639\d{9})$/',
            'email' => 'required|email',
            'position' => 'required',
        ]);
    }
    // Create a new user record in the database
    dd(request()->all());

    // Redirect to the user creation page after successful submission
    redirect('/users/create')->with('message', 'User created successfully!');
});

Route::get('users/create', function () {
    return view('pages.users.create');
});

// Route::view('/', 'pages.index');
// Route::view('/login', 'pages.auth.login');
