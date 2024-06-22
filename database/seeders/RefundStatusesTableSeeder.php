<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RefundStatus;

class RefundStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RefundStatus::create([
            'name' => 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        RefundStatus::create([
            'name' => 'Approved',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
