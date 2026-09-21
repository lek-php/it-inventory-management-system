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
            'name' => 'Felix Bragais',
            'department_id' => 1,
            'phone' => '0912-345-6789',
            'email' => 'felix_bragais@engtek.com',
            'position' => 'IT Staff',
            'is_active' => 1,
            'is_login_user' => 1,
            'password' => 'password123',
        ]);

        User::create([
            'employee_id' => 'EMP-00001',
            'name' => 'Test User',
            'department_id' => 1,
            'phone' => '0939-800-3457',
            'email' => 'test_email@engtek.com',
            'position' => 'IT Officer',
            'is_active' => 1,
            'is_login_user' => 1,
            'password' => 'password321',
        ]);

        $this->call(AssetSeeder::class);
    }
}
