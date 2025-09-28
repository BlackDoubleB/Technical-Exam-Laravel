<?php

namespace Database\Factories;

use App\Models\Asistencia;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Asistencia>
 */
class AsistenciaFactory extends Factory
{
    protected $model = Asistencia::class;

    public function definition(): array
    {
        return [
            'person_id' => Persona::factory(),
            'date' => $this->faker->dateTimeBetween('-30 days', 'now')->format('Y-m-d'),
            'status' => $this->faker->randomElement(['Presente','Falta','Tardanza','Permiso']),
        ];
    }
}
