<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
      public function run()
    {
        User::factory()->create([
            'email' => 'gestor@email.com',
            'perfil' => 'gestor',
        ]);

        User::factory()->create([
            'email' => 'funcionario@email.com',
            'perfil' => 'funcionario',
        ]);
    }
}
