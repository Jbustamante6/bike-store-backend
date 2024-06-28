<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Role::create(['name' => 'Super-Administrator', 'guard_name' => 'api']);
        Role::create(['name' => 'Administrator', 'guard_name' => 'api']);
        Role::create(['name' => 'Seller', 'guard_name' => 'api']);
        Role::create(['name' => 'Customer', 'guard_name' => 'api']);
    }
}
