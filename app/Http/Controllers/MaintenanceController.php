<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Machine;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        $maintenances = Maintenance::with('machine')->get();
        return view('maintenances.index', compact('maintenances'));
    }

    public function create()
    {
        $machines = Machine::all();
        return view('maintenances.create', compact('machines'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'date_maintenance' => 'required|date',
            'description' => 'nullable|string',
            'prochaine_maintenance' => 'nullable|date',
        ]);

        Maintenance::create($validated);

        return redirect()->route('maintenances.index')->with('success', 'Maintenance created successfully.');
    }

    public function edit(Maintenance $maintenance)
    {
        $machines = Machine::all();
        return view('maintenances.edit', compact('maintenance', 'machines'));
    }

    public function update(Request $request, Maintenance $maintenance)
    {
        $validated = $request->validate([
            'machine_id' => 'required|exists:machines,id',
            'date_maintenance' => 'required|date',
            'description' => 'nullable|string',
            'prochaine_maintenance' => 'nullable|date',
        ]);

        $maintenance->update($validated);

        return redirect()->route('maintenances.index')->with('success', 'Maintenance updated successfully.');
    }

    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();

        return redirect()->route('maintenances.index')->with('success', 'Maintenance deleted successfully.');
    }
}
