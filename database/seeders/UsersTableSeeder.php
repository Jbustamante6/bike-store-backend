<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'document_type_id' => 1, // Tipo de documento (por ejemplo, 1 para pasaporte)
            'doc_number' => '123456789',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'username' => 'john_doe',
            'password' => \Hash::make('password'), // Asegúrate de que las contraseñas estén cifradas
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        User::create([
            'document_type_id' => 2, // Tipo de documento (por ejemplo, 2 para licencia de conducir)
            'doc_number' => '987654321',
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane@example.com',
            'username' => 'jane_smith',
            'password' => \Hash::make('password'), // Asegúrate de que las contraseñas estén cifradas
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);

        User::create([
            'document_type_id' => 1, // Tipo de documento (por ejemplo, 1 para pasaporte)
            'doc_number' => '1122334455',
            'first_name' => 'Alice',
            'last_name' => 'Johnson',
            'email' => 'alice@example.com',
            'username' => 'alice_johnson',
            'password' => \Hash::make('password'), // Asegúrate de que las contraseñas estén cifradas
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ]);
    }
}
