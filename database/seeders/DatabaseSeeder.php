<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(DocumentTypesTableSeeder::class);
        $this->call(BookStatusesTableSeeder::class);
        $this->call(RefundStatusesTableSeeder::class);
        $this->call(ProductStatusesTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(ServiceTypesTableSeeder::class);
        $this->call(ProductTypesTableSeeder::class);
        $this->call(ShippingCompaniesTableSeeder::class);
        $this->call(PqrStatusesTableSeeder::class);
        $this->call(PqrTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(PurchasesTableSeeder::class);
        $this->call(BooksHasProductsTableSeeder::class);
        $this->call(PurchasesHasProductsTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserRolesSeeder::class);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
