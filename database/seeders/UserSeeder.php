<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nom' => 'Dupont',
            'prenom' => 'Jean',
            'email' => 'jean.dupont@example.com',
            'password' => bcrypt('password'),
            'role' => 'joueur',
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
