<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert([
            [
                'owner_id' => 1,
                'date' => '4/30',
                'today_sale' => 1000,
                'total_sales' => 1000,
                'plan_rate' => '5.0%',
                'last_rate' => '100.0%',
            ],
            [
                'owner_id' => 1,
                'date' => '5/1',
                'today_sale' => 2000,
                'total_sales' => 3000,
                'plan_rate' => '8.0%',
                'last_rate' => '100.0%',
            ],
            [
                'owner_id' => 1,
                'date' => '5/2',
                'today_sale' => 3000,
                'total_sales' => 6000,
                'plan_rate' => '10.0%',
                'last_rate' => '100.0%', 
            ],
            [
                'owner_id' => 1,
                'date' => '5/3',
                'today_sale' => 4000,
                'total_sales' => 11000,
                'plan_rate' => '15.0%',
                'last_rate' => '100.0%',
            ],
           
            ]);
    }
}