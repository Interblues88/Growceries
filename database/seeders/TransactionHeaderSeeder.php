<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactionHeader')->insert([
            [
                'userId' => 3,
                'courierId' => 2,
                'addressId' => 1,
                'orderStatus' => 'Packing',
                'deliveryTime' => Carbon::now()->addDays(1),
                'payment' => 'ShopeePay',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'userId' => 4,
                'courierId' => 2,
                'addressId' => 2,
                'orderStatus' => 'Shipped',
                'payment' => 'ShopeePay',
                'deliveryTime' => Carbon::now()->addDays(1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
