<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductType;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductType::create([
            'name' => 'Mountain Bike',
            'description' => 'Bicycles designed for off-road cycling.',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        ProductType::create([
            'name' => 'Road Bike',
            'description' => 'Bicycles designed for fast travel on paved roads.',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        ProductType::create([
            'name' => 'Hybrid Bike',
            'description' => 'Bicycles that combine features of both road and mountain bikes.',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        ProductType::create([
            'name' => 'Electric Bike',
            'description' => 'Bicycles equipped with an electric motor to assist with pedaling.',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        ProductType::create([
            'name' => 'Folding Bike',
            'description' => 'Bicycles that can be folded for easy storage and transport.',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
