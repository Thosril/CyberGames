<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MachinesGameController;
use App\Http\Controllers\UsersPackageController;

use App\Http\Controllers\UserPackageController;

// Page d'accueil (optionnel)
Route::get('/', function () {
    return view('welcome'); // Modifier si vous avez une vue d'accueil
});

// Routes CRUD
Route::resource('users', UserController::class);
Route::resource('packages', PackageController::class);
Route::resource('machines', MachineController::class);
Route::resource('games', GameController::class);
Route::resource('maintenances', MaintenanceController::class);
Route::resource('machines-games', MachinesGameController::class);
Route::resource('users-packages', UsersPackageController::class);




// Route::prefix('users/{user}/packages')->group(function() {
//     Route::get('/', [UserPackageController::class, 'index'])->name('userpackages.index');
//     Route::get('create', [UserPackageController::class, 'create'])->name('userpackages.create');
//     Route::post('/', [UserPackageController::class, 'store'])->name('userpackages.store');
//     Route::get('{packageId}', [UserPackageController::class, 'show'])->name('userpackages.show');
//     Route::get('{packageId}/edit', [UserPackageController::class, 'edit'])->name('userpackages.edit');
//     Route::put('{packageId}', [UserPackageController::class, 'update'])->name('userpackages.update');
//     Route::delete('{packageId}', [UserPackageController::class, 'destroy'])->name('userpackages.destroy');
// });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth']);


// if (auth()->user()->role === 'joueur') {
//     // Redirige ou autorise.
// }
