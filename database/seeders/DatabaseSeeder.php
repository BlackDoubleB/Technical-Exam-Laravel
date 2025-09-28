<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            AreaSeeder::class,
            PersonaSeeder::class,
            AsistenciaSeeder::class,
        ]);

        // Sample users with roles
        $adminRole = Role::where('name', 'Administrador')->first();
        $superRole = Role::where('name', 'Supervisor')->first();
        $colabRole = Role::where('name', 'Colaborador')->first();

        User::query()->firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role_id' => optional($adminRole)->id,
            ]
        );

        User::query()->firstOrCreate(
            ['email' => 'supervisor@example.com'],
            [
                'name' => 'Supervisor',
                'password' => Hash::make('password'),
                'role_id' => optional($superRole)->id,
            ]
        );

        User::query()->firstOrCreate(
            ['email' => 'colaborador@example.com'],
            [
                'name' => 'Colaborador',
                'password' => Hash::make('password'),
                'role_id' => optional($colabRole)->id,
            ]
        );
    }
}
