<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
                'name' => 'ブラジル',
                'email' => 'test@test.com',
                'password' => Hash::make('Password123'),
                'created_at' => '2021/01/01 11:11:11'    
            ],
            [
                'name' => 'コロンビア',
                'email' => 'test2@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2021/01/01 11:11:11'    
            ],
            [
                'name' => 'グァテマラ',
                'email' => 'test3@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2021/01/01 11:11:11'    
            ],
            [
                'name' => 'ジャマイカ',
                'email' => 'test4@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2021/01/01 11:11:11'    
            ],
            [
                'name' => 'エチオピア',
                'email' => 'test5@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2021/01/01 11:11:11'    
            ],
            [
                'name' => 'タンザニア',
                'email' => 'test6@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2021/01/01 11:11:11'    
            ],
            [
                'name' => 'キューバ',
                'email' => 'test7@test.com',
                'password' => Hash::make('password123'),
                'created_at' => '2021/01/01 11:11:11'    
            ],
        ]);
    }
}