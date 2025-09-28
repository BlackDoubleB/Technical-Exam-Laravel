<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Persona;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    public function run(): void
    {
        $areas = Area::all();
        if ($areas->isEmpty()) {
            $areas = Area::factory(3)->create();
        }

        // Create 30 people distributed across existing areas
        Persona::factory(30)->make()->each(function ($persona) use ($areas) {
            $persona->area_id = $areas->random()->id;
            $persona->save();
        });
    }
}
