<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<4;$i++){
            DB::table('categories')->insert([
                'name' => "category$i",
                'parent_id' => ($i == 2) ? 1 : null,
            ]);
        }
    }
}
