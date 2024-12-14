<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Package;
use App\Models\UserPackage;
use Illuminate\Http\Request;

class UserPackageController extends Controller
{
    /**
     * Affiche la liste des packages d'un utilisateur.
     */
    public function index(User $user)
    {
        // Récupère les packages associés à l'utilisateur
        $userPackages = $user->packages;
        return view('userpackages.index', compact('user', 'userPackages'));
    }

    /**
     * Affiche le formulaire de création d'une relation user-package.
     */
    public function create(User $user)
    {
        $packages = Package::all(); // Liste de tous les packages disponibles
        return view('userpackages.create', compact('user', 'packages'));
    }

    /**
     * Enregistre une nouvelle relation user-package.
     */
    public function store(Request $request, User $user)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'reservation_date' => 'required|date',
            'duration' => 'required|integer',
            'status' => 'required|in:confirmée,annulée',
        ]);

        // Création de la relation user-package
        $user->packages()->attach($validated['package_id'], [
            'reservation_date' => $validated['reservation_date'],
            'duration' => $validated['duration'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('userpackages.index', $user)->with('success', 'Package ajouté avec succès!');
    }

    /**
     * Affiche les détails d'une relation user-package.
     */
    public function show(User $user, $packageId)
    {
        $userPackage = $user->packages()->wherePivot('package_id', $packageId)->first();
        return view('userpackages.show', compact('userPackage', 'user'));
    }

    /**
     * Affiche le formulaire pour modifier une relation user-package.
     */
    public function edit(User $user, $packageId)
    {
        $userPackage = $user->packages()->wherePivot('package_id', $packageId)->first();
        $packages = Package::all();
        return view('userpackages.edit', compact('user', 'userPackage', 'packages'));
    }

    /**
     * Met à jour une relation user-package.
     */
    public function update(Request $request, User $user, $packageId)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'reservation_date' => 'required|date',
            'duration' => 'required|integer',
            'status' => 'required|in:confirmée,annulée',
        ]);

        // Mise à jour de la relation user-package
        $user->packages()->updateExistingPivot($packageId, [
            'reservation_date' => $validated['reservation_date'],
            'duration' => $validated['duration'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('userpackages.index', $user)->with('success', 'Package mis à jour avec succès!');
    }

    /**
     * Supprime une relation user-package.
     */
    public function destroy(User $user, $packageId)
    {
        // Suppression de la relation
        $user->packages()->detach($packageId);

        return redirect()->route('userpackages.index', $user)->with('success', 'Package supprimé avec succès!');
    }
}
