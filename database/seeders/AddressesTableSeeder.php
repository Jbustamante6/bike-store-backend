<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create([
            'city_id' => 1, // ID de la ciudad
            'user_id' => 1, // ID del usuario
            'address' => '123 Main St',
            'is_default' => 1, // 1 para dirección predeterminada
            'postal_code' => '10001',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Address::create([
            'city_id' => 2, // ID de la ciudad
            'user_id' => 1, // ID del usuario
            'address' => '456 Side St',
            'is_default' => 0, // 0 para no predeterminada
            'postal_code' => '10002',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Address::create([
            'city_id' => 1, // ID de la ciudad
            'user_id' => 3, // ID del usuario
            'address' => '789 High St',
            'is_default' => 1, // 1 para dirección predeterminada
            'postal_code' => '10003',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
