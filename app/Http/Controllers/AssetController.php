<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;

class AssetController extends Controller
{

    public function index()
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
            'has_network' => request('has_netword') ? 1 : 0,
            'has_anti_virus' => request('has_anti_virus') ? 1 : 0,
        ]);

        return redirect()->route('pages.assets.create')->with('success', 'Asset created successfully!');
    }

    public function create()
    {
        return view('pages.assets.create');
    }

    public function show(int $id)
    {
        $asset = Asset::where('id', $id)->with('assignedUser.department')->firstOrfail();
        return view('pages.assets.show', [
            'asset' => $asset,
        ]);
    }

    public function edit(int $id)
    {
        $asset = Asset::where('id', $id)->with('assignedUser')->firstOrFail();
        return view('pages.assets.edit', [
            'asset' => $asset,
        ]);
    }

    public function update(int $id)
    {
        $asset = Asset::where('id', $id)->firstOrFail();

        $rules = [
            'asset_name' => 'required',
            'category' => 'required',
            'manufacturer' => 'required',
            'model' => 'required',
            'serial_number' => 'required',
            'vendor' => 'required',
            'status' => 'required',
            'assigned_to' => 'nullable|required_with:location',
            'location' => 'nullable|required_with:assigned_to',
            'purchase_date' => 'required|date',
            'warranty_expiration' => 'required|date',
        ];

        $rules = request()->validate($rules);

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
            'notes' => request('notes'),
        ]);

        return redirect("/assets/asset/{$id}/edit")->with('success', 'Asset updated successfully!');
    }

    public function assign(int $id)
    {
        $asset = Asset::findOrFail($id);

        request()->validate([
            'assigned_to' => 'required',
            'location' => 'required',
        ]);

        // dd(request()->all());

        $asset->update([
            'assigned_to' => request('assigned_to'),
            'location' => request('location'),
            'status' => 'Assigned',
            'has_network' => request()->has('has_network') ? 1 : 0,
            'has_anti_virus' => request()->has('has_anti_virus') ? 1 : 0,
        ]);

        return redirect("assets/asset/{$asset->id}")->with('success', "Asset '{$asset->asset_name}' assigned successfully");
    }

    public function transfer(int $id)
    {
        $asset = Asset::findOrFail($id);
    }
}
