<?php

namespace Database\Factories;

use App\Models\Area;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Area>
 */
class AreaFactory extends Factory
{
    protected $model = Area::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Recursos Humanos','Logistica','Ventas','Finanzas','Operaciones','TI']),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->boolean(90),
        ];
    }
}
