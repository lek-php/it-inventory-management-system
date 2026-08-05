<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;
use App\Models\Location;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => $this->faker->unique()->numerify('EMP-####'),
            'department_id' => Department::factory(),
            'location_id' => Location::factory(),
            'phone' => $this->faker->phoneNumber(),
            'position' => $this->faker->jobTitle(),
            'is_active' => $this->faker->boolean(80), // 80%
            'is_login_user' => $this->faker->boolean(50), // 50%
            'password' => bcrypt('password'), // Default password
        ];
    }
}
