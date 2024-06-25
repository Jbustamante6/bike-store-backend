<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'product_type_id' => 1, // Mountain Bike
            'product_status_id' => 1, // In Stock
            'name' => 'Trek Mountain Bike',
            'sku' => 'TREK-MTB-001',
            'existences' => 10,
            'properties' => json_encode(['color' => 'Red', 'size' => 'M']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Product::create([
            'product_type_id' => 2, // Road Bike
            'product_status_id' => 1, // In Stock
            'name' => 'Giant Road Bike',
            'sku' => 'GIANT-RB-002',
            'existences' => 5,
            'properties' => json_encode(['color' => 'Blue', 'size' => 'L']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Product::create([
            'product_type_id' => 3, // Hybrid Bike
            'product_status_id' => 1, // In Stock
            'name' => 'Specialized Hybrid Bike',
            'sku' => 'SPEC-HB-003',
            'existences' => 8,
            'properties' => json_encode(['color' => 'Green', 'size' => 'S']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Product::create([
            'product_type_id' => 4, // Electric Bike
            'product_status_id' => 1, // In Stock
            'name' => 'Bosch Electric Bike',
            'sku' => 'BOSCH-EB-004',
            'existences' => 2,
            'properties' => json_encode(['color' => 'Black', 'battery' => '500Wh']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Product::create([
            'product_type_id' => 5, // Folding Bike
            'product_status_id' => 1, // In Stock
            'name' => 'Brompton Folding Bike',
            'sku' => 'BROM-FB-005',
            'existences' => 7,
            'properties' => json_encode(['color' => 'Yellow', 'folding_time' => '10s']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
