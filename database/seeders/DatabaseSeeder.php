<?php

namespace Database\Seeders;

use App\Models\productDetail;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            ProductDetailSeeder::class,
            ProductSeeder::class,
            AddressSeeder::class,
            TransactionHeaderSeeder::class,
            CartSeeder::class,
             CartListSeeder::class,
             TransactionDetailSeeder::class,
             RefundSeeder::class
        ]);
    }
}
