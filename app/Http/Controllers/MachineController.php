<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::all();
        return view('machines.index', compact('machines'));
    }

    public function create()
    {
        return view('machines.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'processeur' => 'required|string|max:255',
            'memoire' => 'required|integer',
            'systeme_exploitation' => 'required|string|max:255',
            'purchase_date' => 'required|date',
            'install_games' => 'nullable|string',
            'status' => 'required|in:disponible,en maintenance,reservé',
            'last_maintenance' => 'nullable|date',
        ]);

        Machine::create($validated);

        return redirect()->route('machines.index')->with('success', 'Machine created successfully.');
    }

    public function edit(Machine $machine)
    {
        return view('machines.edit', compact('machine'));
    }

    public function update(Request $request, Machine $machine)
    {
        $validated = $request->validate([
            'processeur' => 'required|string|max:255',
            'memoire' => 'required|integer',
            'systeme_exploitation' => 'required|string|max:255',
            'purchase_date' => 'required|date',
            'install_games' => 'nullable|string',
            'status' => 'required|in:disponible,en maintenance,reservé',
            'last_maintenance' => 'nullable|date',
        ]);

        $machine->update($validated);

        return redirect()->route('machines.index')->with('success', 'Machine updated successfully.');
    }

    public function destroy(Machine $machine)
    {
        $machine->delete();

        return redirect()->route('machines.index')->with('success', 'Machine deleted successfully.');
    }
}
