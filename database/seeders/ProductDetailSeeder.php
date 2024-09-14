<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productDetail')->insert([
            [
                'calories' => 16,
                'fat' => 0.4,
                'sugar' => 0.4,
                'carbohydrate' => 3.2,
                'protein' => 2.3,
                'shelfLife' => '3-5 Days',
                'productCategory' => 'Vegetable',
                'productDesc' => 'This is a fruit vegetable ing english blalbalallallb',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Bayam Hijau',
                'origin' => 'Indonesia'
            ],
            [
                'calories' => 23,
                'fat' => 0.4,
                'sugar' => 0.4,
                'carbohydrate' => 3.6,
                'protein' => 2.9,
                'shelfLife' => '3-5 Days',
                'productCategory' => 'Vegetable',
                'productDesc' => 'this is the best vegetables in the world',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Bayam Merah',
                'origin' => 'Pulau Seribu'
            ],
            [
                'calories' => 72,
                'fat' => 0.1,
                'sugar' => 8.9,
                'carbohydrate' => 16.8,
                'protein' => 2.5,
                'shelfLife' => '3-5 Days',
                'productCategory' => 'Vegetable',
                'productDesc' => 'this is the best vegetables in the world',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Bawang Merah',
                'origin' => 'Pulau Duaribu'
            ],
            [
                'calories' => 67,
                'fat' => 0.4,
                'sugar' => 16,
                'carbohydrate' => 18,
                'protein' => 0.6,
                'shelfLife' => '6-7 Days',
                'productCategory' => 'Fruit',
                'productDesc' => 'Anggur hitam tanpa biji dengan dominan rasa segar dan sedikit rasa manis, after taste yang balance antara segar dan manis.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Anggur Hitam Adora',
                'origin' => 'Impor'
            ],
            [
                // 5
                'calories' => 43,
                'fat' => 0.4,
                'sugar' => 9.8,
                'carbohydrate' => 11.3,
                'protein' => 0.3,
                'shelfLife' => '5-7 Days',
                'productCategory' => 'Fruit',
                'productDesc' => 'Ukurannya lebih kecil dari apel biasanya. Rasanya manis sampai asam. Tekstur apel cenderung renyah. Cocok dinikmati sebagai camilan atau dimasak menjadi berbagai kreasi makanan. Produk ini dapat digunakan sebagai menu MPASI.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Apel Cherry',
                'origin' => 'Kalimantan Utara'
            ],
            [
                // 6
                'calories' => 149,
                'fat' => 0.5,
                'sugar' => 1,
                'carbohydrate' => 33,
                'protein' => 6.4,
                'shelfLife' => '3-5 Days',
                'productCategory' => 'Vegetable',
                'productDesc' => 'Bawang putih bulat utuh pilihan terbaik. Lebih tahan lama. Aromanya khas dan membuat rasa masakan lebih sedap. Terdapat potensi kelebihan/kekurangan gramasi +-10% per pack Produk ini dapat digunakan sebagai menu MPASI.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Bawang Putih',
                'origin' => 'Sulawesi Utara'
            ],
            [
                // 7
                'calories' => 43,
                'fat' => 0.5,
                'sugar' => 4.9,
                'carbohydrate' => 9.6,
                'protein' => 1.4,
                'shelfLife' => '2-3 Days',
                'productCategory' => 'Fruit',
                'productDesc' => 'Ditanam secara hidroponik. Lebih segar, sehat, dan berkualitas. Strawberry sweetheart memiliki bentuk yang unik dan warna merah yang menggugah selera. Daging buah juicy dengan rasa yang segar.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Blackberry Hidroponik',
                'origin' => 'Sulawesi Selatan'
            ],
            [
                // 8
                'calories' => 34,
                'fat' => 0.4,
                'sugar' => 1.7,
                'carbohydrate' => 6.6,
                'protein' => 2.8,
                'shelfLife' => '3-4 Days',
                'productCategory' => 'Vegetable',
                'productDesc' => 'Brokoli konvensional memiliki warna hijau segar. Cocok diolah sebagai sup, dimasak saus, capcay, atau tumisan lainnya. Dapat dikreasikan dengan cara dikukus, digoreng, atau dibakar sesuai selera.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Brokoli',
                'origin' => 'Makassar'
            ],
            [
                // 9
                'calories' => 60,
                'fat' => 0.6,
                'sugar' => 9,
                'carbohydrate' => 9,
                'protein' => 1.2,
                'shelfLife' => '1-2 Days',
                'productCategory' => 'Fruit',
                'productDesc' => 'Buah naga dengan daging buah berwarna merah. Rasanya ringan cenderung manis. Teksturnya lembut. Cocok untuk camilan atau bekal.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Buah Naga Merah',
                'origin' => 'Tangerang'
            ],
            [
                // 10
                'calories' => 40,
                'fat' => 0.2,
                'sugar' => 4.4,
                'carbohydrate' => 8.8,
                'protein' => 1.9,
                'shelfLife' => '2-6 Days',
                'productCategory' => 'Vegetable',
                'productDesc' => 'Yang suka makan gorengan pake cabai hijau rawit ini siapa? Enak ya makan gorengan sambil gigit cabai hijau kecil ini.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Cabai Rawit Hijau',
                'origin' => 'Jakarta'
            ],
            [
                // 11
                'calories' => 40,
                'fat' => 0.4,
                'sugar' => 5.3,
                'carbohydrate' => 8.8,
                'protein' => 1.9,
                'shelfLife' => '3-5 Days',
                'productCategory' => 'Vegetable',
                'productDesc' => 'Warna bisa campur antara merah 80% - 90% dan warna lain (hijau, kuning, orange, putih) sekitar 10% - 20%. ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Cabai Rawit Merah',
                'origin' => 'Jakarta'
            ],
            [
                // 12
                'calories' => 32,
                'fat' => 0.7,
                'sugar' => 1.9,
                'carbohydrate' => 7.3,
                'protein' => 1.8,
                'shelfLife' => '3-5 Days',
                'productCategory' => 'Vegetable',
                'productDesc' => 'Daun bawang memiliki bentuk memanjang dengan batang putih berdaging tebal. Daun bawang memiliki aroma dan rasa yang khas. ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Daun Bawang Organik',
                'origin' => 'Jakarta'
            ],
            [
                // 13
                'calories' => 34,
                'fat' => 0.2,
                'sugar' => 8,
                'carbohydrate' => 8,
                'protein' => 0.8,
                'shelfLife' => '10-15 Days',
                'productCategory' => 'Fruit',
                'productDesc' => 'Melon Elysia termasuk jenis Hamigua Korea kuning dengan bibit yang langsung diambil dari Korea.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Melon Elysia Hidroponik',
                'origin' => 'Jakarta'
            ],
            [
                // 14
                'calories' => 13,
                'fat' => 0.2,
                'sugar' => 1.2,
                'carbohydrate' => 2.2,
                'protein' => 1.5,
                'shelfLife' => '3-4 Days',
                'productCategory' => 'Vegetable',
                'productDesc' => 'Ukuran beragam tergantung musim. Biasa digunakan di masakan asia. Daunnya besar dan halus.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Pak Choy',
                'origin' => 'Jakarta'
            ],
            [
                // 15
                'calories' => 43,
                'fat' => 0.5,
                'sugar' => 8.3,
                'carbohydrate' => 10.8,
                'protein' => 0.5,
                'shelfLife' => '3-4 Days',
                'productCategory' => 'Fruit',
                'productDesc' => 'Kulit pepaya california berwarna hijau dan akan menguning ketika menuju matang.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Pepaya California',
                'origin' => 'Jakarta'
            ],
            [
                // 16
                'calories' => 42,
                'fat' => 0.2,
                'sugar' => 9.8,
                'carbohydrate' => 10.7,
                'protein' => 0.4,
                'shelfLife' => '3-5 Days',
                'productCategory' => 'Fruit',
                'productDesc' => 'Pir madu impor asal RRC. Rasanya lebih manis dari jenis pir biasanya.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Pir Madu',
                'origin' => 'Impor'
            ],
            [
                // 17
                'calories' => 89,
                'fat' => 0.3,
                'sugar' => 12.2,
                'carbohydrate' => 22.8,
                'protein' => 1.1,
                'shelfLife' => '3-4 Days',
                'productCategory' => 'Fruit',
                'productDesc' => 'Pisang Cavendish RTE (ready to eat) adalah pisang siap untuk dikonsumsi tanpa perlu menunggu matang dan memiliki kulit kuning ada bercak hitam, berdaging putih, juga memiliki rasa manis yang lembut di mulut. ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Pisang Cavendish',
                'origin' => 'Pulau Monyet'
            ],
            [
                // 18
                'calories' => 25,
                'fat' => 0.1,
                'sugar' => 3.2,
                'carbohydrate' => 5.8,
                'protein' => 1.3,
                'shelfLife' => '2-5 Days',
                'productCategory' => 'Vegetable',
                'productDesc' => 'Sawi Putih memiliki daun yang lebih lebar, cukup tebal dan kaku. Soal rasa, engga kalah enak sama sawi pada umumnya. Warna sawi umumnya putih dengan warna hijau pucat di bagian tepinya.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Sawi Putih',
                'origin' => 'Jawa Tengah'
            ],
            [
                // 19
                'calories' => 30,
                'fat' => 0.2,
                'sugar' => 6.2,
                'carbohydrate' => 7.6,
                'protein' => 0.6,
                'shelfLife' => '7-14 Days',
                'productCategory' => 'Fruit',
                'productDesc' => 'Semangka merah memiliki rasa manis, segar, dan banyak airnya. Cocok untuk camilan, jus, sop buah, dan kreasi makanan lainnya.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Semangka Merah',
                'origin' => 'Jakarta'
            ],
            [
                // 20
                'calories' => 32,
                'fat' => 0.3,
                'sugar' => 5.9,
                'carbohydrate' => 7.7,
                'protein' => 0.7,
                'shelfLife' => '2-3 Days',
                'productCategory' => 'Fruit',
                'productDesc' => 'Ditanam secara hidroponik. Lebih segar, sehat, dan berkualitas. Strawberry sweetheart memiliki bentuk yang unik dan warna merah yang menggugah selera.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'productName' => 'Strawberry Sweethearts',
                'origin' => 'Bogor'
            ],
        ]); 
    }
}