<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Asset;
use App\Models\User;

use Carbon\Carbon;


class UserController extends Controller
{
    public function show()
    {
        Asset::all();
        $total_users = Asset::count();
        $active_users = User::where('is_active', true)->count();

        // Asset Data
        $with_asset = User::where('has_asset', true)->count();
        $with_asset_average  = ($with_asset / $total_users) * 100;
        $without_asset = User::where('has_asset', false)->count();

        // Count users created in the current month
        $total_users_this_month = User::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();

        return view('pages.users.index', [
            'total_users' => $total_users,
            'total_users_this_month' => $total_users_this_month,
            'active_users' => $active_users,
            'with_asset' => $with_asset,
            'with_asset_average' => round($with_asset_average, 2),
            'without_asset' => $without_asset,
        ]);
    }

    public function insert()
    {
        $rules = [
            'employee_id' => 'required|unique:users,employee_id',
            'name' => 'required',
            'department' => 'required',
            'phone' => ['regex:/^(09\d{9}|\+639\d{9})$/'],
            'email' => 'required|email',
            'position' => 'required',
        ];

        if (request()->boolean('is_login_user')) {
            $rules['password'] = 'required|min:8';
        }

        request()->validate($rules);

        User::create([
            'employee_id' => request('employee_id'),
            'name' => request('name'),
            'department_id' => request('department'),
            'phone' => request('phone'),
            'email' => request('email'),
            'position' => request('position'),
            'password' => request('password') ? bcrypt(request('password')) : null,
        ]);

        return redirect()->route('pages.users.create')->with('success', 'User added successfully!');
    }

    public function create()
    {
        return view('pages.users.create');
    }
}
