<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductStatus;


class ProductStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductStatus::create([
            'name' => 'In Stock',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        ProductStatus::create([
            'name' => 'Out of Stock',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
