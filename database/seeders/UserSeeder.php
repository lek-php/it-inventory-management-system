<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

        User::create([
            'employee_id' => 'EMP-00002',
            'name' => 'John Dela Cruz',
            'department_id' => 2,
            'phone' => '0917-234-5678',
            'email' => 'john_delacruz@engtek.com',
            'position' => 'Production Staff',
            'is_active' => 1,
            'is_login_user' => 0,
            'password' => null,
        ]);

        User::create([
            'employee_id' => 'EMP-00003',
            'name' => 'Maria Santos',
            'department_id' => 3,
            'phone' => '0920-345-6789',
            'email' => 'maria_santos@engtek.com',
            'position' => 'HR Staff',
            'is_active' => 1,
            'is_login_user' => 1,
            'password' => 'password234',
        ]);

        User::create([
            'employee_id' => 'EMP-00004',
            'name' => 'Carlo Reyes',
            'department_id' => 4,
            'phone' => '0918-456-7890',
            'email' => 'carlo_reyes@engtek.com',
            'position' => 'Quality Engineer',
            'is_active' => 1,
            'is_login_user' => 1,
            'password' => 'password345',
        ]);

        User::create([
            'employee_id' => 'EMP-00005',
            'name' => 'Angela Garcia',
            'department_id' => 5,
            'phone' => '0927-567-8901',
            'email' => 'angela_garcia@engtek.com',
            'position' => 'Accounting Staff',
            'is_active' => 1,
            'is_login_user' => 1,
            'password' => 'password456',
        ]);

        User::create([
            'employee_id' => 'EMP-00006',
            'name' => 'Mark Villanueva',
            'department_id' => 2,
            'phone' => '0919-678-9012',
            'email' => 'mark_villanueva@engtek.com',
            'position' => 'Production Operator',
            'is_active' => 1,
            'is_login_user' => 0,
            'password' => null,
        ]);

        User::create([
            'employee_id' => 'EMP-00007',
            'name' => 'Sofia Mendoza',
            'department_id' => 3,
            'phone' => '0921-789-0123',
            'email' => 'sofia_mendoza@engtek.com',
            'position' => 'HR Assistant',
            'is_active' => 1,
            'is_login_user' => 1,
            'password' => 'password567',
        ]);

        User::create([
            'employee_id' => 'EMP-00008',
            'name' => 'Daniel Bautista',
            'department_id' => 4,
            'phone' => '0916-890-1234',
            'email' => 'daniel_bautista@engtek.com',
            'position' => 'QA Staff',
            'is_active' => 1,
            'is_login_user' => 0,
            'password' => null,
        ]);

        User::create([
            'employee_id' => 'EMP-00009',
            'name' => 'Nicole Fernandez',
            'department_id' => 5,
            'phone' => '0922-901-2345',
            'email' => 'nicole_fernandez@engtek.com',
            'position' => 'Finance Staff',
            'is_active' => 1,
            'is_login_user' => 1,
            'password' => 'password678',
        ]);

        User::create([
            'employee_id' => 'EMP-00010',
            'name' => 'Kevin Ramos',
            'department_id' => 2,
            'phone' => '0915-012-3456',
            'email' => 'kevin_ramos@engtek.com',
            'position' => 'Production Staff',
            'is_active' => 1,
            'is_login_user' => 0,
            'password' => null,
        ]);

        User::create([
            'employee_id' => 'EMP-00011',
            'name' => 'Patricia Aquino',
            'department_id' => 3,
            'phone' => '0928-123-4567',
            'email' => 'patricia_aquino@engtek.com',
            'position' => 'HR Officer',
            'is_active' => 1,
            'is_login_user' => 1,
            'password' => 'password789',
        ]);

        User::create([
            'employee_id' => 'EMP-00012',
            'name' => 'Ryan Navarro',
            'department_id' => 4,
            'phone' => '0914-234-5678',
            'email' => 'ryan_navarro@engtek.com',
            'position' => 'Quality Staff',
            'is_active' => 1,
            'is_login_user' => 0,
            'password' => null,
        ]);

        User::create([
            'employee_id' => 'EMP-00013',
            'name' => 'Christine Flores',
            'department_id' => 5,
            'phone' => '0923-345-6789',
            'email' => 'christine_flores@engtek.com',
            'position' => 'Accounting Officer',
            'is_active' => 1,
            'is_login_user' => 1,
            'password' => 'password890',
        ]);
    }
}
