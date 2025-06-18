<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
      public function run()
    {
        $gestorEmail = config(key: 'app.notificacao_email_gestor');
        User::factory()->create([
            'email' =>  $gestorEmail,
            'perfil' => 'gestor',
        ]);

        User::factory()->create([
            'email' => 'funcionario@email.com',
            'perfil' => 'funcionario',
        ]);
    }
}
