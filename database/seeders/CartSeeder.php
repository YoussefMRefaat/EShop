<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=2;$i<5;$i++){
            DB::table('carts')->insert([
                'user_id' => $i,
            ]);
            DB::table('cart_product')->insert(
                ['cart_id' => $i, 'product_id' => $i-1],
                ['cart_id' => $i, 'product_id' => $i],
            );
        }
    }
}
