<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'service_type_id' => 1,
            'name' => 'Basic Bike Repair',
            'description' => 'Basic repair services for bicycles, including tire repairs and brake adjustments.',
            'properties' => json_encode(['duration' => '1 hour', 'price' => '20 USD']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Service::create([
            'service_type_id' => 2,
            'name' => 'Full Day Bike Rental',
            'description' => 'Rent a bike for a full day to explore the city or countryside.',
            'properties' => json_encode(['duration' => '24 hours', 'price' => '50 USD']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Service::create([
            'service_type_id' => 3,
            'name' => 'Professional Bike Fitting',
            'description' => 'Get a professional bike fitting to ensure optimal comfort and performance.',
            'properties' => json_encode(['duration' => '2 hours', 'price' => '100 USD']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Service::create([
            'service_type_id' => 4,
            'name' => 'Guided Cycling Tour',
            'description' => 'Join a guided cycling tour to discover scenic routes and local attractions.',
            'properties' => json_encode(['duration' => '4 hours', 'price' => '75 USD']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Service::create([
            'service_type_id' => 5,
            'name' => 'Comprehensive Bike Maintenance',
            'description' => 'Comprehensive maintenance services to keep your bike in top condition.',
            'properties' => json_encode(['duration' => '3 hours', 'price' => '150 USD']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
