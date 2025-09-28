<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Persona>
 */
class PersonaFactory extends Factory
{
    protected $model = Persona::class;

    public function definition(): array
    {
        $firstName = $this->faker->firstName();
        $lastName = $this->faker->lastName();
        return [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'dni_id' => $this->faker->unique()->numerify('########'),
            'email' => strtolower($firstName . '.' . $lastName) . $this->faker->numberBetween(1, 999) . '@example.com',
            'area_id' => Area::factory(),
        ];
    }
}
