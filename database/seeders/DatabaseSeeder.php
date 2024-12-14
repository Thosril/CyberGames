<?php

// DatabaseSeeder.php
use App\Models\User;
use App\Models\Package;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Création d'un utilisateur
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'), // Assurez-vous de définir un mot de passe valide
            'role' => 'joueur',
        ]);

        // Création d'un package
        $package = Package::create([
            'name' => 'Premium Package',
            'price' => 99.99,
            'duration' => 30,
            'description' => 'Access to all premium features',
        ]);

        // Attacher un package à l'utilisateur via la table pivot
        $user->packages()->attach($package->id, [
            'reservation_date' => now(),
            'duration' => 30,
            'status' => 'active',
        ]);
    }
}
