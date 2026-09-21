<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asset;

class AssetSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asset::create([
            'asset_name' => 'MacBook Pro',
            'category' => 'Laptop',
            'tag' => 'ASB-0003',
            'manufacturer' => 'Apple',
            'model' => 'MacBook Pro 16-inch',
            'serial_number' => 'C02ZK0XQMD6L',
            'vendor' => 'Apple Store',
            'status' => 'Assigned',
            'assigned_to' => 'Jose Rizal',
            'location' => 1,
            'purchase_date' => '2023-01-15',
            'warranty_expiration' => '2025-01-15',
            'notes' => null,
        ]);

        Asset::create([
            'asset_name' => 'ThinkPad E14',
            'category' => 'Laptop',
            'tag' => 'ASB-0001',
            'manufacturer' => 'Lenovo',
            'model' => '21M70087PH',
            'serial_number' => '45017894H',
            'vendor' => 'AMTI',
            'status' => 'Assigned',
            'assigned_to' => 'Felix Bragais',
            'location' => 1,
            'purchase_date' => '2023-01-15',
            'warranty_expiration' => '2025-01-15',
            'notes' => null,
        ]);

        Asset::create([
            'asset_name' => 'OptiPlex 7010',
            'category' => 'Desktop',
            'tag' => 'ASB-0004',
            'manufacturer' => 'Dell',
            'model' => 'OptiPlex 7010',
            'serial_number' => 'DL7010X92841',
            'vendor' => 'Dell Technologies',
            'status' => 'Assigned',
            'assigned_to' => 'Maria Santos',
            'location' => 'Finance Office',
            'purchase_date' => '2023-03-10',
            'warranty_expiration' => '2026-03-10',
            'notes' => null,
        ]);

        Asset::create([
            'asset_name' => 'ThinkCentre M70q',
            'category' => 'Desktop',
            'tag' => 'ASB-0005',
            'manufacturer' => 'Lenovo',
            'model' => 'ThinkCentre M70q Gen 3',
            'serial_number' => 'PCMT70Q88231',
            'vendor' => 'AMTI',
            'status' => 'Available',
            'assigned_to' => null,
            'location' => 'IT Office',
            'purchase_date' => '2023-06-20',
            'warranty_expiration' => '2026-06-20',
            'notes' => 'Spare workstation.',
        ]);

        Asset::create([
            'asset_name' => 'UltraSharp Monitor',
            'category' => 'Peripherals',
            'tag' => 'ASB-0006',
            'manufacturer' => 'Dell',
            'model' => 'U2422H',
            'serial_number' => 'MONU2422H73921',
            'vendor' => 'Dell Technologies',
            'status' => 'Assigned',
            'assigned_to' => 'Maria Santos',
            'location' => 'Finance Office',
            'purchase_date' => '2023-03-10',
            'warranty_expiration' => '2026-03-10',
            'notes' => null,
        ]);

        Asset::create([
            'asset_name' => 'Magic Keyboard',
            'category' => 'Peripherals',
            'tag' => 'ASB-0007',
            'manufacturer' => 'Apple',
            'model' => 'Magic Keyboard',
            'serial_number' => 'KBDMAC849231',
            'vendor' => 'Apple Store',
            'status' => 'Available',
            'assigned_to' => null,
            'location' => 'IT Office',
            'purchase_date' => '2024-01-12',
            'warranty_expiration' => '2025-01-12',
            'notes' => null,
        ]);

        Asset::create([
            'asset_name' => 'MX Master 3S',
            'category' => 'Peripherals',
            'tag' => 'ASB-0008',
            'manufacturer' => 'Logitech',
            'model' => 'MX Master 3S',
            'serial_number' => 'LOGMX3S552891',
            'vendor' => 'Logitech',
            'status' => 'Assigned',
            'assigned_to' => 'John Cruz',
            'location' => 'HR Office',
            'purchase_date' => '2024-02-05',
            'warranty_expiration' => '2027-02-05',
            'notes' => null,
        ]);

        Asset::create([
            'asset_name' => 'WH-1000XM5',
            'category' => 'Peripherals',
            'tag' => 'ASB-0009',
            'manufacturer' => 'Sony',
            'model' => 'WH-1000XM5',
            'serial_number' => 'SONYXM5A98231',
            'vendor' => 'Sony Center',
            'status' => 'Assigned',
            'assigned_to' => 'Anna Reyes',
            'location' => 'HR Office',
            'purchase_date' => '2024-02-20',
            'warranty_expiration' => '2026-02-20',
            'notes' => 'Wireless headset.',
        ]);

        Asset::create([
            'asset_name' => 'LaserJet Pro',
            'category' => 'Printer',
            'tag' => 'ASB-0010',
            'manufacturer' => 'HP',
            'model' => 'LaserJet Pro M404dn',
            'serial_number' => 'HP404DN728391',
            'vendor' => 'HP Philippines',
            'status' => 'Assigned',
            'assigned_to' => null,
            'location' => 'Admin Office',
            'purchase_date' => '2023-08-15',
            'warranty_expiration' => '2025-08-15',
            'notes' => 'Shared office printer.',
        ]);

        Asset::create([
            'asset_name' => 'ThinkPad T14',
            'category' => 'Laptop',
            'tag' => 'ASB-0011',
            'manufacturer' => 'Lenovo',
            'model' => 'ThinkPad T14 Gen 4',
            'serial_number' => 'LNV014T492831',
            'vendor' => 'AMTI',
            'status' => 'For maintenance',
            'assigned_to' => null,
            'location' => 'IT Office',
            'purchase_date' => '2024-04-18',
            'warranty_expiration' => '2027-04-18',
            'notes' => 'Currently undergoing maintenance.',
        ]);
    }
}
