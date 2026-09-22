<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'id' => 1,
            'name' => 'Information Technology',
            'code' => 'IT',
            'description' => 'Responsible for information technology, systems, software, infrastructure, network, cybersecurity, and technical support.',
            'is_active' => 1,
        ]);

        Department::create([
            'id' => 2,
            'name' => 'Human Resources',
            'code' => 'HR',
            'description' => 'Responsible for employee recruitment, onboarding, personnel records, employee relations, training, and organizational development.',
            'is_active' => 1,
        ]);

        Department::create([
            'id' => 3,
            'name' => 'Quality Assurance',
            'code' => 'QA',
            'description' => 'Responsible for maintaining product and process quality through inspection, testing, quality control, and continuous improvement.',
            'is_active' => 1,
        ]);

        Department::create([
            'id' => 4,
            'name' => 'Casting',
            'code' => 'CAS',
            'description' => 'Responsible for casting operations, including material preparation, casting processes, production activities, and adherence to quality standards.',
            'is_active' => 1,
        ]);

        Department::create([
            'id' => 5,
            'name' => 'Production Planning & Material Control',
            'code' => 'PPMC',
            'description' => 'Responsible for production planning, scheduling, material requirements, inventory coordination, and ensuring the availability of materials for production.',
            'is_active' => 1,
        ]);

        Department::create([
            'id' => 6,
            'name' => 'Finance',
            'code' => 'FIN',
            'description' => 'Responsible for financial planning, budgeting, cash management, financial reporting, and monitoring the company’s financial activities.',
            'is_active' => 1,
        ]);

        Department::create([
            'id' => 7,
            'name' => 'Sales',
            'code' => 'SALES',
            'description' => 'Responsible for customer acquisition, sales activities, account management, order generation, and achieving sales targets.',
            'is_active' => 1,
        ]);

        Department::create([
            'id' => 8,
            'name' => 'Secondary',
            'code' => 'SEC',
            'description' => 'Responsible for secondary production and supporting operations necessary to meet production requirements and quality standards.',
            'is_active' => 1,
        ]);

        Department::create([
            'id' => 9,
            'name' => 'Management',
            'code' => 'MNG',
            'description' => 'Responsible for organizational leadership, strategic planning, decision-making, performance management, and overall business direction.',
            'is_active' => 1,
        ]);

        Department::create([
            'id' => 10,
            'name' => 'Compliance',
            'code' => 'CMP',
            'description' => 'Responsible for ensuring compliance with applicable laws, regulations, company policies, standards, and internal controls.',
            'is_active' => 1,
        ]);

        Department::create([
            'id' => 11,
            'name' => 'Facility',
            'code' => 'FAC',
            'description' => 'Responsible for facility operations, workplace services, utilities, infrastructure, safety, and maintaining a suitable working environment.',
            'is_active' => 1,
        ]);

        Department::create([
            'id' => 12,
            'name' => 'Maintenance',
            'code' => 'MAINT',
            'description' => 'Responsible for preventive and corrective maintenance of machinery, equipment, facilities, and production-related systems.',
            'is_active' => 1,
        ]);
    }
}
