<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=2;$i<5;$i++){
            DB::table('orders')->insert([
                'user_id' => $i,
                'status' => 'pending',
                'ship_fee' => 5,
                'created_at' => now(),
            ]);
            for ($y=1;$y<4;$y++){
                DB::table('order_product')->insert([
                    'order_id' => $i-1,
                    'product_id' => $y,
                    'quantity' => $y,
                    'each_price' => 50,
                ]);
            }
        }
    }
}
