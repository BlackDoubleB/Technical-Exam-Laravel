<?php

namespace Database\Seeders;

use App\Models\Asistencia;
use App\Models\Persona;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AsistenciaSeeder extends Seeder
{
    public function run(): void
    {
        $people = Persona::all();
        if ($people->isEmpty()) {
            return;
        }

        $start = Carbon::now()->subDays(30)->startOfDay();
        $end = Carbon::now()->startOfDay();

        foreach ($people as $person) {
            $date = $start->copy();
            while ($date->lte($end)) {
                Asistencia::query()->updateOrCreate(
                    ['person_id' => $person->id, 'date' => $date->toDateString()],
                    ['status' => collect(['Presente','Falta','Tardanza','Permiso'])->random()]
                );
                $date->addDay();
            }
        }
    }
}
