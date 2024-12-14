<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Package;

class UserPackageSeeder extends Seeder
{
    public function run()
    {
        $user = User::find(1); // L'utilisateur avec l'ID 1
        $package = Package::find(2); // Le package avec l'ID 2

        // Attacher le package à l'utilisateur
        $user->packages()->attach($package->id, [
            'reservation_date' => now(),
            'duration' => 120,
            'status' => 'confirmée',
        ]);
    }
}
