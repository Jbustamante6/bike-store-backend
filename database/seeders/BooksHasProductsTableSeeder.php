<?php

namespace Database\Seeders;

use App\Models\BookHasProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class BooksHasProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books_has_products')->insert([
            [
                'book_id' => 1,
                'product_id' => 1,
            ],
            [
                'book_id' => 1,
                'product_id' => 2,
            ],
            [
                'book_id' => 2,
                'product_id' => 1,
            ],
            [
                'book_id' => 2,
                'product_id' => 3,
            ],
            [
                'book_id' => 3,
                'product_id' => 2,
            ],
            [
                'book_id' => 3,
                'product_id' => 3,
            ],
            // Add more entries as needed
        ]);
    }
}
