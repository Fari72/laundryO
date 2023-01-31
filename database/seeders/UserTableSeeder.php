<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@laundry.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'kasir',
            'email' => 'kasir@laundry.com',
            'password' => bcrypt('kasir'),
            'role' => 'kasir'
        ]);
        DB::table('users')->insert([
            'name' => 'owner',
            'email' => 'owner@laundry.com',
            'password' => bcrypt('owner'),
            'role' => 'owner'
        ]);
    }
}
