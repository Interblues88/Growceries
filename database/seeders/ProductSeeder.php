<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product')->insert([
            [
                'productDetailId' => 1,
                'productName' => 'Bayam Hijau',
                'productPrice' => 4400,
                'stock' => 15,
                'variant' => 250,
                'image' => '/image/productImage/productbayamhijau.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 2,
                'productName' => 'Bayam Merah',
                'productPrice' => 6500,
                'stock' => 25,
                'variant' => 250,
                'image' => '/image/productImage/productbayammerah.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 3,
                'productName' => 'Bawang Merah',
                'productPrice' => 9900,
                'stock' => 7,
                'variant' => 100,
                'image' => '/image/productImage/productbawangmerah.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 4,
                'productName' => 'Anggur Hitam Adora',
                'productPrice' => 21100,
                'stock' => 11,
                'variant' => 250,
                'image' => '/image/productImage/productanggurhitamadora.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 5,
                'productName' => 'Apel Cherry',
                'productPrice' => 18600,
                'stock' => 22,
                'variant' => 500,
                'image' => '/image/productImage/productapelcherry.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 6,
                'productName' => 'Bawang Putih',
                'productPrice' => 56700,
                'stock' => 2,
                'variant' => 1000,
                'image' => '/image/productImage/productbawangputih.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 7,
                'productName' => 'Blackberry Hidroponik',
                'productPrice' => 98900,
                'stock' => 8,
                'variant' => 125,
                'image' => '/image/productImage/productblackberryhidroponik.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 8,
                'productName' => 'Brokoli',
                'productPrice' => 17400,
                'stock' => 21,
                'variant' => 500,
                'image' => '/image/productImage/productbrokoli.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 9,
                'productName' => 'Buah Naga Merah',
                'productPrice' => 29900,
                'stock' => 7,
                'variant' => 1000,
                'image' => '/image/productImage/productbuahnagamerah.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 10,
                'productName' => 'Cabai Rawit Hijau',
                'productPrice' => 14500,
                'stock' => 12,
                'variant' => 150,
                'image' => '/image/productImage/productcaberawithijau.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 11,
                'productName' => 'Cabai Rawit Merah',
                'productPrice' => 9500,
                'stock' => 17,
                'variant' => 100,
                'image' => '/image/productImage/productcaberawitmerah.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 12,
                'productName' => 'Daun Bawang Organik',
                'productPrice' => 19900,
                'stock' => 7,
                'variant' => 250,
                'image' => '/image/productImage/productdaunbawang.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 13,
                'productName' => 'Melon Elysia Hidroponik',
                'productPrice' => 88900,
                'stock' => 3,
                'variant' => 1600,
                'image' => '/image/productImage/productmelonelysia.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 14,
                'productName' => 'Pak Choy',
                'productPrice' => 9600,
                'stock' => 8,
                'variant' => 500,
                'image' => '/image/productImage/productpakchoy.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 15,
                'productName' => 'Pepaya California',
                'productPrice' => 11900,
                'stock' => 12,
                'variant' => 1700,
                'image' => '/image/productImage/productpepayacalifornia.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 16,
                'productName' => 'Pir Madu',
                'productPrice' => 12300,
                'stock' => 9,
                'variant' => 400,
                'image' => '/image/productImage/productpirmadu.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 17,
                'productName' => 'Pisang Cavendish',
                'productPrice' => 11000,
                'stock' => 17,
                'variant' => 500,
                'image' => '/image/productImage/productpisangcavendish.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 18,
                'productName' => 'Sawi Putih',
                'productPrice' => 22900,
                'stock' => 6,
                'variant' => 1000,
                'image' => '/image/productImage/productsawiputih.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 19,
                'productName' => 'Semangka Merah',
                'productPrice' => 47900,
                'stock' => 7,
                'variant' => 3200,
                'image' => '/image/productImage/productsemangkamerah.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'productDetailId' => 20,
                'productName' => 'Strawberry Sweethearts',
                'productPrice' => 17900,
                'stock' => 13,
                'variant' => 125,
                'image' => '/image/productImage/productstrawberrysweethearts.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
