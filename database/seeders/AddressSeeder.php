<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('address')->insert([
            [
                'userId' => 3,
                'addressName' => 'Rumah',
                'addressDetail' => 'Jl. Raya Timur, Blok A1, No. 1, Jakarta Timur, 13450, Indonesia',
                'receiverName' => 'Delvin Setiamin',
                'phoneNumber' => '081234567892',
                'status' => 'primary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()    
            ],
            [
                'userId' => 4,
                'addressName' => 'Rumah',
                'addressDetail' => 'Jl. Raya Barat, Blok B2, No. 2, Jakarta Barat, 13450, Indonesia',
                'receiverName' => 'Jacky',
                'phoneNumber' => '081234567895',
                'status' => 'primary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()    
            ],
            [
                'userId' => 5,
                'addressName' => 'Rumah haha',
                'addressDetail' => 'Jl. Raya Utara, Blok C3, No. 3, Jakarta Utara, 13450, Indonesia',
                'receiverName' => 'Ghoran',
                'phoneNumber' => '081234567836',
                'status' => 'primary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'userId' => 6,
                'addressName' => 'Rumah hihi',
                'addressDetail' => 'Jl. Raya Selatan, Blok D4, No. 4, Jakarta Selatan, 13450, Indonesia',
                'receiverName' => 'Apeng',
                'phoneNumber' => '081234567830',
                'status' => 'primary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'userId' => 7,
                'addressName' => 'Rumah hoho',
                'addressDetail' => 'Jl. Raya Tengah, Blok E5, No. 5, Jakarta Pusat, 13450, Indonesia',
                'receiverName' => 'Atha',
                'phoneNumber' => '081234567831',
                'status' => 'primary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]


        ]);
    }
}
