<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<9;$i++){
            DB::table('products')->insert([
                'name' => "product$i",
                'description' => "description$i",
                'category_id' => ($i%4) ? $i%4 : 4,
                'stock' => 50,
                'image' => 'http://placehold.it/150',
                'price' => 50,
            ]);
        }
    }
}
