<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Administrador', 'description' => 'Acceso total al sistema'],
            ['name' => 'Supervisor', 'description' => 'Gestiona asistencias y reportes de su área'],
            ['name' => 'Colaborador', 'description' => 'Puede marcar asistencia y ver sus reportes'],
        ];

        foreach ($roles as $r) {
            Role::query()->firstOrCreate(['name' => $r['name']], $r);
        }
    }
}
