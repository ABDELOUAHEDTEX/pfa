<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Supprime tous les enregistrements de la table 'users'
        User::truncate();

        // Crée 5 nouveaux utilisateurs avec des données générées aléatoirement
        User::factory(5)->create();
        
        // Crée un utilisateur spécifique pour les tests
        User::factory()->create([
            'nom' => 'Test User', // Utilise 'nom' au lieu de 'name'
            'email' => 'test@example.com',
        ]);
    }
}
