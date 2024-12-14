<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::all();
        return view('packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric', 
            'duration' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        Package::create($request->all());

        return redirect()->route('packages.index')->with('success', 'Package créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        return view('packages.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $package->update($request->all());

        return redirect()->route('packages.index')->with('success', 'Package mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Package supprimé avec succès.');
    }
}
