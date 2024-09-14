<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'gender' => 'Laki - Laki',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'utype' => 'admin',
                'phoneNumber' => '081234567890' 
            ],
            [
                'name' => 'Courier',
                'email' => 'courier@gmail.com',
                'password' => bcrypt('12345678'),
                'gender' => 'Laki - Laki',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'utype' => 'courier',
                'phoneNumber' => '081234567891' 
            ],
            [
                'name' => 'delvin',
                'email' => 'delvin.setiamin.08@gmail.com',
                'password' => bcrypt('12345678'),
                'gender' => 'Laki - Laki',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'utype' => 'customer',
                'phoneNumber' => '081234567892' 
            ],
            [
                'name' => 'jacky',
                'email' => 'jacky@gmail.com',
                'password' => bcrypt('12345678'),
                'gender' => 'Laki - Laki',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'utype' => 'customer',
                'phoneNumber' => '081234567893' 
            ],
            [
                'name' => 'ghoran',
                'email' => 'ghoran@gmail.com',
                'password' => bcrypt('12345678'),
                'gender' => 'Laki - Laki',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'utype' => 'customer',
                'phoneNumber' => '081234567894' 
            ],
            [
                'name' => 'marvel',
                'email' => 'marvel@gmail.com',
                'password' => bcrypt('12345678'),
                'gender' => 'Laki - Laki',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'utype' => 'customer',
                'phoneNumber' => '081234567895' 
            ],
            [
                'name' => 'athalia',
                'email' => 'athalia@gmail.com',
                'password' => bcrypt('12345678'),
                'gender' => 'Perempuan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'utype' => 'customer',
                'phoneNumber' => '081234567896' 
            ],
        ]);
    }
}
