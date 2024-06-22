<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class PurchasesHasProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('purchases_has_products')->insert([
            [
                'purchase_id' => 1,
                'product_id' => 1,
            ],
            [
                'purchase_id' => 1,
                'product_id' => 2,
            ],
            [
                'purchase_id' => 2,
                'product_id' => 3,
            ],
            [
                'purchase_id' => 2,
                'product_id' => 4,
            ],
            [
                'purchase_id' => 3,
                'product_id' => 5,
            ],
            [
                'purchase_id' => 3,
                'product_id' => 1,
            ],
            // Add more entries as needed
        ]);
    }
}
