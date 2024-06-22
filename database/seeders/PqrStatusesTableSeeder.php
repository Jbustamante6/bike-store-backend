<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PQRStatus;

class PqrStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PQRStatus::create([
            'name' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        PQRStatus::create([
            'name' => 'Closed',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
