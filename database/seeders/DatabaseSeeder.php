<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use App\Models\Location;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Location::create([
            'id' => 1,
            'name' => 'Admin Office',
        ]);

        Department::create([
            'id' => 1,
            'name' => 'Information Technology',
            'code' => 'IT',
            'description' => 'Information Technology Department',
            'is_active' => 1,
        ]);

        User::create([
            'employee_id' => 'EMP-21779',
            'department_id' => 1,
            'location_id' => 1,
            'phone' => '09123456789',
            'position' => 'IT Staff',
            'is_active' => 1,
            'is_login_user' => 1,
            'password' => 'password123',
        ]);
    }
}
