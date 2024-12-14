<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Récupère tous les utilisateurs
        return view('users.index', compact('users')); // Envoie les données à la vue
    }

    public function packages()
    {
        return $this->belongsToMany(Package::class)->withPivot('reservation_date', 'duration', 'status');
    }


    public function create()
    {
        return view('users.create'); // Retourne la vue pour créer un utilisateur
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:joueur,employé',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // hash mdp
            'role' => $validated['role'],
        ]);

        // Redirection avec message de succès
        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès !');
    }


    public function show(User $user)
    {
        return view('users.show', compact('user')); // Affiche un utilisateur
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:8', // Le mot de passe est facultatif
        'role' => 'required|in:joueur,employé',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = bcrypt($validated['password']); // Hasher le mot de passe
        } else {
            unset($validated['password']); // Ne pas modifier le mot de passe si vide
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Utilisateur modifié avec succès');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès');    }
}
