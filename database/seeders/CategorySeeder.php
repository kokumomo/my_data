<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('primary_categories')->insert([
            [
                'name' => '浅煎り',
                'sort_order' => 1,
            ],
            [
                'name' => '中煎り',
                'sort_order' => 2,
            ],
            [
                'name' => '深煎り',
                'sort_order' => 3,
            ],
            ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'ライトロースト',
                'sort_order' => 1,
                'primary_category_id' => 1
            ],
            [
                'name' => 'シナモンロースト',
                'sort_order' => 2,
                'primary_category_id' => 1
            ],
            [
                'name' => 'ミディアムロースト',
                'sort_order' => 3,
                'primary_category_id' => 2
            ],
            [
                'name' => 'ハイロースト',
                'sort_order' => 4,
                'primary_category_id' => 2
            ],
            [
                'name' => 'シティロースト',
                'sort_order' => 5,
                'primary_category_id' => 2
            ],
            [
                'name' => 'フルシティロースト',
                'sort_order' => 6,
                'primary_category_id' => 3
            ],
            [
                'name' => 'フレンチロースト',
                'sort_order' => 7,
                'primary_category_id' => 3
            ],
            [
                'name' => 'イタリアンロースト',
                'sort_order' => 7,
                'primary_category_id' => 3
            ],
            ]);

    
        }
}