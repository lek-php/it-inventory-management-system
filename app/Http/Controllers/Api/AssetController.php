<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Asset;

class AssetController extends Controller
{
    public function assets()
    {
        Asset::all();
    }
}
