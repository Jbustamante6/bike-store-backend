<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookStatus;

class BookStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookStatus::create([
            'status' => 'Available',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        BookStatus::create([
            'status' => 'Checked Out',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
