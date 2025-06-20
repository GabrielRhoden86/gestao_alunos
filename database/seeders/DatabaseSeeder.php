<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        User::factory()->create([
            'email' =>  "gabrielrhodden@gmail.com",
            'perfil' => 'gestor',
        ]);

        # Perfil funcionários
        User::factory()->create([
            'email' => 'funcionario@email.com',
            'perfil' => 'funcionario',
        ]);
    }
}
