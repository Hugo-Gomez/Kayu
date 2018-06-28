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
                'created_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103',
                'status' => 'yes',
                'created_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '9002490205973',
                'status' => 'no',
                'created_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103',
                'status' => 'yes',
                'created_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '9002490205973',
                'status' => 'no',
                'created_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103',
                'status' => 'yes',
                'created_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '9002490205973',
                'status' => 'no',
                'created_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103',
                'status' => 'yes',
                'created_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '9002490205973',
                'status' => 'no',
                'created_at' => $date
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103',
                'status' => 'yes',
                'created_at' => $date
            ]
        ];

        DB::table('history')->insert($history);
    }
}
