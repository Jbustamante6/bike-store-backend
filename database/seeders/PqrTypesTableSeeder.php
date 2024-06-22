<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PQRType;


class PqrTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PQRType::create([
            'name' => 'Complaint',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        PQRType::create([
            'name' => 'Request',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
