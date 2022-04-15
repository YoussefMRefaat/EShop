<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavouritesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=2;$i<4;$i++){
            DB::table('favourites')->insert(
                ['user_id' => $i, 'product_id' => $i],
                ['user_id' => $i, 'product_id' => $i+1],
            );
        }
    }
}
