<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fullname' => 'Fahrul SW',
            'email' => 'email@gmail.com',
            'username' => 'fahrul',
            'no_hp' => '098123456789',
            'password' => Hash::make('12345'),
        ]);
    }
}
