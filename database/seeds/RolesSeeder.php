<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'végétarien'], 
            ['name' => 'végétalien'],
            ['name' => 'diabétique'],
            ['name' => 'halal'],
            ['name' => 'casher'],
            ['name' => 'arachide'],
            ['name' => 'poisson'],
            ['name' => 'crustacé'],
            ['name' => 'blé'],
            ['name' => 'oeuf'],
            ['name' => 'gluten'],
            ['name' => 'lactose'],
            ['name' => 'lait de vache'],
            ['name' => 'fruits à coque'],
            ['name' => 'pois'],
            ['name' => 'haricot'],
            ['name' => 'lentille'],
            ['name' => 'fève'],
            ['name' => 'soja'],
            ['name' => 'lupin'],
            ['name' => 'moutarde'],
            ['name' => 'sésame'],
            ['name' => 'mollusque'],
            ['name' => 'céleri']
        ];

        DB::table('roles')->insert($roles);
    }
}