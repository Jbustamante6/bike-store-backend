<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'purchaser_id' => 1, // ID del comprador
            'book_status_id' => 1, // Estado del libro
            'seller_id' => 2, // ID del vendedor
            'payment_method_id' => 1, // Método de pago
            'book_date' => now(),
            'details' => json_encode(['item' => 'Mountain Bike', 'quantity' => 1, 'price' => '500 USD']),
            'delivery_date' => now()->addDays(5),
            'return_date' => now()->addDays(30),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Book::create([
            'purchaser_id' => 2, // ID del comprador
            'book_status_id' => 2, // Estado del libro
            'seller_id' => 3, // ID del vendedor
            'payment_method_id' => 2, // Método de pago
            'book_date' => now(),
            'details' => json_encode(['item' => 'Road Bike', 'quantity' => 2, 'price' => '1000 USD']),
            'delivery_date' => now()->addDays(3),
            'return_date' => now()->addDays(20),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        Book::create([
            'purchaser_id' => 3, // ID del comprador
            'book_status_id' => 1, // Estado del libro
            'seller_id' => 1, // ID del vendedor
            'payment_method_id' => 1, // Método de pago
            'book_date' => now(),
            'details' => json_encode(['item' => 'Hybrid Bike', 'quantity' => 1, 'price' => '750 USD']),
            'delivery_date' => now()->addDays(7),
            'return_date' => now()->addDays(25),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
