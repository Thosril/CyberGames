<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\UserPackageController;
use App\Http\Controllers\ForfaitController;
use App\Http\Controllers\JoueurController;

// Page d'accueil
Route::get('/', function () {
    return view('welcome'); // Vue d'accueil (login/register)
})->name('welcome');

// Routes CRUD pour les ressources principales
Route::resource('users', UserController::class);
Route::resource('packages', PackageController::class);
Route::resource('machines', MachineController::class);
Route::resource('games', GameController::class);
Route::resource('maintenances', MaintenanceController::class);

// Gestion des relations User-Package
Route::prefix('user-packages')->middleware('auth')->group(function () {
    Route::get('/', [UserPackageController::class, 'index'])->name('userpackages.index'); // Liste des forfaits d'un utilisateur
    Route::get('create', [UserPackageController::class, 'create'])->name('userpackages.create'); // Formulaire d'achat d'un forfait
    Route::post('/', [UserPackageController::class, 'store'])->name('userpackages.store'); // Enregistrement d'un forfait
    Route::get('{packageId}', [UserPackageController::class, 'show'])->name('userpackages.show'); // Détails d'un forfait
    Route::delete('{packageId}', [UserPackageController::class, 'destroy'])->name('userpackages.destroy'); // Suppression d'un forfait
});


// Routes pour acheter et gérer les forfaits
Route::prefix('forfaits')->group(function () {
    Route::get('/', [ForfaitController::class, 'index'])->name('forfaits.index'); // Liste des forfaits disponibles
    Route::get('{forfaitId}/acheter', [ForfaitController::class, 'acheter'])->name('forfaits.acheter'); // Achat d'un forfait
    Route::get('/success', [ForfaitController::class, 'success'])->name('forfaits.success'); // Succès de l'achat
    Route::get('/cancel', [ForfaitController::class, 'cancel'])->name('forfaits.cancel'); // Annulation
});

// Route pour l'achat direct d'un package
Route::post('/packages/{package}/purchase', [PackageController::class, 'purchase'])
    ->middleware('auth')
    ->name('packages.purchase');

// Dashboard avec gestion des rôles


    Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->role === 'joueur') {
            return redirect('/joueur-dashboard'); // Redirection vers tableau de bord joueur
        }
        return view('dashboard'); // Tableau de bord admin/employé
    })->name('dashboard');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', function () {
            $user = auth()->user();
            if ($user->role === 'joueur') {
                return redirect('/joueur-dashboard'); // Redirection vers tableau de bord joueur
            }
            return view('dashboard'); // Tableau de bord employé
        })->name('dashboard');

        // Routes pour les employés (et peut-être un administrateur si nécessaire)
        Route::prefix('admin')->middleware('role:employé')->group(function () {
            Route::resource('users', UserController::class);
            Route::resource('packages', PackageController::class);
            Route::resource('machines', MachineController::class);
            Route::resource('games', GameController::class);
            Route::resource('maintenances', MaintenanceController::class);
        });

        Route::get('/joueur-dashboard', function () {
            return view('joueurs.dashboard');
        })->name('joueurs.dashboard');
        });

    }
);
