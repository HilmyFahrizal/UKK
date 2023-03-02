<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nm_lengkap' => 'Administrator',
            'nm_user' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'is_admin' => true
        ]);

        DB::table('users')->insert([
            'nm_lengkap' => 'raisah safana',
            'nm_user' => 'icha',
            'email' => 'icha@gmail.com',
            'password' => bcrypt('123456'),
            'is_admin' => false
        ]);
    }
}
