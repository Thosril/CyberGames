<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            // Ne pas inclure 'email_verified_at'
            // 'email_verified_at' => now(), // Enlevez cette ligne
        ]);


        User::create([
            'nom' => 'Durand',
            'prenom' => 'Marie',
            'email' => 'marie.durand@example.com',
            'password' => bcrypt('password'),
            'role' => 'employé',
        ]);
    }
}
