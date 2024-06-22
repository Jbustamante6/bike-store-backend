<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceType;

class ServiceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceType::create([
            'name' => 'Bike Repair',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        ServiceType::create([
            'name' => 'Bike Rental',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        ServiceType::create([
            'name' => 'Bike Fitting',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        ServiceType::create([
            'name' => 'Cycling Tours',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        ServiceType::create([
            'name' => 'Bike Maintenance',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

    }
}
