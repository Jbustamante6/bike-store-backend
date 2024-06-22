<?php

namespace Database\Seeders;

use App\Models\Purchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Purchase::create([
            'purchaser_id' => 1, // ID del comprador
            'seller_id' => 2, // ID del vendedor
            'payment_method_id' => 1, // Método de pago
            'purchase_date' => now(),
            'details' => json_encode(['item' => 'Mountain Bike', 'quantity' => 1, 'price' => '500 USD']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Purchase::create([
            'purchaser_id' => 2, // ID del comprador
            'seller_id' => 3, // ID del vendedor
            'payment_method_id' => 2, // Método de pago
            'purchase_date' => now(),
            'details' => json_encode(['item' => 'Road Bike', 'quantity' => 2, 'price' => '1000 USD']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Purchase::create([
            'purchaser_id' => 3, // ID del comprador
            'seller_id' => 1, // ID del vendedor
            'payment_method_id' => 2, // Método de pago
            'purchase_date' => now(),
            'details' => json_encode(['item' => 'Hybrid Bike', 'quantity' => 1, 'price' => '750 USD']),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
