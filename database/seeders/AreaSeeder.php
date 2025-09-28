<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = [
            ['name' => 'Recursos Humanos', 'description' => 'Gestión de talento', 'status' => true],
            ['name' => 'Logística', 'description' => 'Operaciones y distribución', 'status' => true],
            ['name' => 'Ventas', 'description' => 'Comercial y ventas', 'status' => true],
        ];

        foreach ($areas as $a) {
            Area::query()->firstOrCreate(['name' => $a['name']], $a);
        }

        // Opcional: crear otras áreas aleatorias
        Area::factory(2)->create();
    }
}
