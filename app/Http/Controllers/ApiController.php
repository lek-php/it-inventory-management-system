<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Asset;
use App\Models\User;
use App\Models\Department;

class ApiController extends Controller
{

    public function assets()
    {
        return Asset::with('assignedUser')->latest()->get();
    }

    // reutnr all users
    public function users()
    {
        return User::with('department')->latest()->get();
    }

    // return all departments
    public function departments()
    {
        return Department::all();
    }

    public function test()
    {
        return view('pages.test', [
            'users' => User::all(),
        ]);
    }
}
