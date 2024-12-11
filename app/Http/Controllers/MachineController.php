<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machines = Machine::paginate(10); // 10 machines par page
        return view('machines.index', compact('machines'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('machines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'processeur' => 'required|string|max:255',
            'memoire' => 'required|integer',
            'systeme_exploitation' => 'required|string|max:255',
            'purchase_date' => 'required|date',
            'install_games' => 'nullable|string',
            'status' => 'required|in:disponible,en maintenance,reservé',
            'last_maintenance' => 'nullable|date',
        ]);

        // Créer la machine
        Machine::create([
            'processeur' => $request->processeur,
            'memoire' => $request->memoire,
            'systeme_exploitation' => $request->systeme_exploitation,
            'purchase_date' => $request->purchase_date,
            'install_games' => $request->install_games,
            'status' => $request->status,
            'last_maintenance' => $request->last_maintenance,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('machines.index')->with('success', 'Machine created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Machine $machine)
    {
        return view('machines.show', compact('machine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine $machine)
    {
        return view('machines.edit', compact('machine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Récupérer la machine à modifier
        $machine = Machine::findOrFail($id);

        $validated = $request->validate([
            'processeur' => 'required|string',
            'memoire' => 'required|integer',
            'systeme_exploitation' => 'required|string',
            'purchase_date' => 'required|date',
            'status' => 'required|in:disponible,en maintenance,reservé',
        ]);

        // Mettre à jour la machine avec les nouvelles données
        $machine->update($validated);

        // Rediriger vers la liste des machines avec un message de succès
        return redirect()->route('machines.index')->with('success', 'Machine mise à jour avec succès.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Machine $machine)
    {
        $machine->delete();

        return redirect()->route('machines.index');
    }
}
