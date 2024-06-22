<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShippingCompany;



class ShippingCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ShippingCompany::create([
            'name' => 'DHL',
            'created_at' => now(),
            'updated_at' => now(),
            'tracking_url' => '',
            'deleted_at' => null,
        ]);

        ShippingCompany::create([
            'name' => 'FedEx',
            'created_at' => now(),
            'updated_at' => now(),
            'tracking_url' => '',
            'deleted_at' => null,
        ]);
    }
}
