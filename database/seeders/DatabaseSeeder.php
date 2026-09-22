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

        $this->call(DepartmentSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AssetSeeder::class);
    }
}
