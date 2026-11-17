<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class AssetController extends Controller
{

    public function show()
    {
        $by_category_count = Asset::select('status')->get()->groupBy('status')->map->count();
        $assets_count = Asset::count();

        return view('pages.assets.index', [
            'assets_count' => $assets_count,
            'by_category_count' => $by_category_count,
        ]);
    }

    public function insert()
    {
        $rules = [
            'asset_name' => 'required',
            'category' => 'required',
            'tag' => 'required',
            'manufacturer' => 'required',
            'model' => 'required',
            'serial_number' => 'required',
            'vendor' => 'required',
            'status' => 'required',
            'purchase_date' => 'required|date',
            'warranty_expiration' => 'required|date',
            'assigned_to' => 'nullable|required_with:location',
            'location' => 'nullable|required_with:assigned_to',
        ];

        $rules = request()->validate($rules);

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
            'has_netword' => request('has_netword') ? 1 : 0,
            'has_anti_virus' => request('has_anti_virus') ? 1 : 0,
        ]);

        return redirect()->route('pages.assets.create')->with('success', 'Asset created successfully!');
    }
}
