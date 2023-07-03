<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'Процессор AMD RYZEN 5 3600',
            'product_description'=>'Частота: 3.6 ГГц и 4.2 ГГц в режиме Turbo;
            Сокет: SocketAM4;',
            'product_price' => '10499',
            'product_qty' => '10',
            'product_image' => 'image/sets/set1.jpg',
            'product_code' => '1002',
            'product_categ' => 'cpu',
        ]);
        DB::table('products')->insert([
            'product_name' => 'Материнская плата GIGABYTE B450M DS3H',
            'product_description'=>'AM4, AMD B450, 4xDDR4-2933 МГц, 2xPCI-Ex16, 1xM.2, Micro-ATX',
            'product_price' => '5199',
            'product_qty' => '10',
            'product_image' => 'image/sets/set2.jpg',
            'product_code' => '2001',
            'product_categ' => 'mbd',
        ]);
        DB::table('products')->insert([
            'product_name' => 'Процессор Intel Core i7-11700K BOX',
            'product_description'=>'LGA 1200, 8 x 3.6 ГГц, L2 - 4 МБ, L3 - 16 МБ, 2хDDR4-3200 МГц, Intel UHD Graphics 750, TDP 125 Вт',
            'product_price' => '22755',
            'product_qty' => '10',
            'product_image' => 'image/sets/set3.jpg',
            'product_code' => '1003',
            'product_categ' => 'cpu',
        ]);
        DB::table('products')->insert([
            'product_name' => 'Видеокарта GIGABYTE GeForce RTX 3060 Ti GAMING OC',
            'product_description'=>'[GV-N306TGAMING OC-8GD rev2.0] [PCI-E 4.0 8 ГБ GDDR6, 256 бит, DisplayPort x2, HDMI x2, GPU 1410 МГц]',
            'product_price' => '41735',
            'product_qty' => '10',
            'product_image' => 'image/sets/set4.jpg',
            'product_code' => '3001',
            'product_categ' => 'gpu',
        ]);
        DB::table('products')->insert([
            'product_name' => 'Блок питания Aerocool KCAS PLUS 1000GM',
            'product_description'=>'1000 Вт, 80+ Gold, EPS12V, APFC, 20 + 4 pin, 4+4 pin x2 CPU, 9 SATA, 6+2 pin x6 PCI-E',
            'product_price' => '11000',
            'product_qty' => '10',
            'product_image' => 'image/sets/set5.jpg',
            'product_code' => '4000',
            'product_categ' => 'bp',
        ]);
        DB::table('products')->insert([
            'product_name' => 'Оперативная память Kingston Fury Beast Black',
            'product_description'=>'DDR4, 8 ГБx2 шт, 3200 МГц, 16-18-18',
            'product_price' => '4490',
            'product_qty' => '10',
            'product_image' => 'image/sets/set6.jpg',
            'product_code' => '1000',
            'product_categ' => 'pam',
        ]);
        DB::table('products')->insert([
            'product_name' => 'Видеокарта Palit GeForce GTX 1660 SUPER Gaming Pro',
            'product_description'=>'PCI-E 3.0 6 ГБ GDDR6, 192 бит, DisplayPort, DVI-D, HDMI, GPU 1530 МГц',
            'product_price' => '20000',
            'product_qty' => '10',
            'product_image' => 'image/sets/set7.jpg',
            'product_code' => '3002',
            'product_categ' => 'gpu',
        ]);
        DB::table('products')->insert([
            'product_name' => 'Видеокарта MSI GeForce RTX 3080 GAMING TRIO PLUS',
            'product_description'=>'PCI-E 4.0 12 ГБ GDDR6X, 384 бит, DisplayPort x3, HDMI, GPU 1260 МГц',
            'product_price' => '80000',
            'product_qty' => '10',
            'product_image' => 'image/sets/set8.jpg',
            'product_code' => '3003',
            'product_categ' => 'gpu',
        ]);
        DB::table('products')->insert([
            'product_name' => 'Процессор AMD Ryzen 7 5800X OEM',
            'product_description'=>'AM4, 8 x 3.8 ГГц, L2 - 4 МБ, L3 - 32 МБ, 2хDDR4-3200 МГц, TDP 105 Вт',
            'product_price' => '19175',
            'product_qty' => '10',
            'product_image' => 'image/sets/set9.jpg',
            'product_code' => '1003',
            'product_categ' => 'cpu',
        ]);
        DB::table('products')->insert([
            'product_name' => 'Материнская плата MSI MAG ',
            'product_description'=>'AM4, 8 x 3.8 ГГц, L2 - 4 МБ, L3 - 32 МБ, 2хDDR4-3200 МГц, TDP 105 Вт',
            'product_price' => '12000',
            'product_qty' => '10',
            'product_image' => 'image/sets/set10.jpg',
            'product_code' => '2002',
            'product_categ' => 'mbd',
        ]);
    }
}
