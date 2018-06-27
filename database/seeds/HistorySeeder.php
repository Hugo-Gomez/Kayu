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
        $history = [
            [
                'user_id' => 1,
                'barcode' => '3329770061866'
            ], 
            [
                'user_id' => 1,
                'barcode' => '5410126104103'
            ],
            [
                'user_id' => 1,
                'barcode' => '9002490205973'
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103'
            ],
            [
                'user_id' => 1,
                'barcode' => '9002490205973'
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103'
            ],
            [
                'user_id' => 1,
                'barcode' => '9002490205973'
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103'
            ],
            [
                'user_id' => 1,
                'barcode' => '9002490205973'
            ],
            [
                'user_id' => 1,
                'barcode' => '5410126104103'
            ]
        ];

        DB::table('history')->insert($history);
    }
}
