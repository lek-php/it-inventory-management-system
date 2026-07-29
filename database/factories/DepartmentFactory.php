<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company(),
            'code' => $this->faker->unique()->bothify('??-###'),
            'description' => $this->faker->optional()->paragraph(),
            'is_active' => $this->faker->boolean(80), // 80% chance of being true
        ];
    }
}
