<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'state_id' => 1, // ID del estado
            'name' => 'New York City',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        City::create([
            'state_id' => 1, // ID del estado
            'name' => 'Albany',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        City::create([
            'state_id' => 2, // ID del estado
            'name' => 'Los Angeles',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        City::create([
            'state_id' => 2, // ID del estado
            'name' => 'San Francisco',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
