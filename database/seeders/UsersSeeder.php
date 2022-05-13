<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('users')->insertGetId([
            'name' => 'admin',
            'email' => 'admin@test',
            'address' => 'home',
            'phone'=> '+20 1234 567 890',
            'password' => Hash::make('Admin123'),
            'is_admin' => true,
        ]);
        DB::table('carts')->insert([
            'user_id' => $id,
        ]);
    }
}
