<?php

use App\Models\Asset;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

//API Routes
Route::get('/api/assets/all', function () {
    return Asset::with('assignedUser')->latest()->get();
});

Route::get('/api/users/all', function () {
    return User::with('department')->latest()->get();
});

Route::get('/api/departments/all', function () {
    return Department::all();
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

    // // Create a new asset record in the database
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
        'has_network' => request('has_network') ? 1 : 0,
        'has_anti_virus' => request('has_anti_virus') ? 1 : 0,
    ]);

    // // Redirect to the asset creation page after successful submission
    return redirect('/assets/create')
        ->with('success', 'New asset added successfully');
});

Route::get('/assets/create', function () {
    return view('pages.assets.create');
});

Route::get('/assets/asset/{tag}', function ($tag) {
    $asset = Asset::where('tag', $tag)->with('assignedUser.department')->firstOrFail();
    return view('pages.assets.show', [
        'asset' => $asset,
    ]);
});

Route::get('/assets/asset/{tag}/edit', function ($tag) {
    $asset = Asset::where('tag', $tag)->with('assignedUser')->firstOrFail();
    return view('pages.assets.edit', [
        'asset' => $asset,
    ]);
});

Route::post('/assets/update/{tag}', function ($tag) {
    $asset = Asset::where('tag', $tag)->firstOrFail();

    // Validate the request data
    request()->validate([
        'asset_name' => 'required',
        'category' => 'required',
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

    // Update the asset record in the database
    $asset->update([
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
        'has_network' => request()->has('has_network') ? 1 : 0,
        'has_anti_virus' => request()->has('has_anti_virus') ? 1 : 0,
        'notes' => request('notes')
    ]);

    // Redirect to the asset edit page after successful update
    return redirect("/assets/asset/{$tag}/edit")
        ->with('success', "Asset '{$asset->asset_name}' updated successfully");
});

Route::post('/assets/asset/{id}/assign', function ($id) {

    $asset = Asset::findOrFail($id);

    request()->validate([
        'assigned_to' => 'required',
    ]);

    $asset->update([
        'assigned_to' => request('assigned_to'),
    ]);

    return redirect("/assets/asset/{$asset->tag}")
        ->with('success', "Asset '{$asset->asset_name}' assigned successfully");
});





// USERS/ PEOPLE ROUTES
Route::get('/users', function () {
    return view('pages.users.index');
});

Route::post('/users/create', function () {

    $rules = [
        'employee_id' => 'required',
        'name' => 'required',
        'department' => 'required',
        'phone' => [
            'regex:/^(09\d{9}|\+639\d{9})$/',
        ],
        'email' => 'required|email',
        'position' => 'required',
    ];

    if (request()->boolean('is_login_user')) {
        $rules['password'] = 'required|min:8';
    }

    request()->validate($rules);

    // Create user here...
    User::create([
        'employee_id' => request('employee_id'),
        'name' => request('name'),
        'department_id' => request('department'),
        'phone' => request('phone'),
        'email' => request('email'),
        'position' => request('position'),
        'password' => request('password'),
    ]);

    return redirect('/users/create')
        ->with('success', 'User added successfully!');
});

Route::get('users/create', function () {
    return view('pages.users.create');
});
