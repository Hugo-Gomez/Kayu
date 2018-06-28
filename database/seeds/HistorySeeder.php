<?php

use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $date = new \DateTime("now", new \DateTimeZone('Europe/Paris'));

        $history = [
            [
                'user_id' => 1,
                'barcode' => '3329770061866',
                'status' => 'yes',
                'name' => 'Yaourt smoothy',
                'image' => 'https://static.openfoodfacts.org/images/products/332/977/006/1866/front_fr.4.200.jpg',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103',
                'status' => 'yes',
                'name' => 'Dinosaurus Minis Chocolat au Lait',
                'image' => 'https://static.openfoodfacts.org/images/products/541/012/610/4103/front_fr.14.400.jpg',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '9002490205973',
                'status' => 'no',
                'name' => 'Red Bull Energy Drink',
                'image' => 'https://static.openfoodfacts.org/images/products/900/249/020/5973/front_fr.24.200.jpg',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103',
                'status' => 'yes',
                'name' => 'Dinosaurus Minis Chocolat au Lait',
                'image' => 'https://static.openfoodfacts.org/images/products/541/012/610/4103/front_fr.14.400.jpg',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '9002490205973',
                'status' => 'no',
                'name' => 'Red Bull Energy Drink',
                'image' => 'https://static.openfoodfacts.org/images/products/900/249/020/5973/front_fr.24.200.jpg',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103',
                'status' => 'yes',
                'name' => 'Dinosaurus Minis Chocolat au Lait',
                'image' => 'https://static.openfoodfacts.org/images/products/541/012/610/4103/front_fr.14.400.jpg',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '9002490205973',
                'status' => 'no',
                'name' => 'Red Bull Energy Drink',
                'image' => 'https://static.openfoodfacts.org/images/products/900/249/020/5973/front_fr.24.200.jpg',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103',
                'status' => 'yes',
                'name' => 'Dinosaurus Minis Chocolat au Lait',
                'image' => 'https://static.openfoodfacts.org/images/products/541/012/610/4103/front_fr.14.400.jpg',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '9002490205973',
                'status' => 'no',
                'name' => 'Red Bull Energy Drink',
                'image' => 'https://static.openfoodfacts.org/images/products/900/249/020/5973/front_fr.24.200.jpg',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103',
                'status' => 'yes',
                'name' => 'Dinosaurus Minis Chocolat au Lait',
                'image' => 'https://static.openfoodfacts.org/images/products/541/012/610/4103/front_fr.14.400.jpg',
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];

        DB::table('history')->insert($history);
    }
}
