<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SnapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('snaps')->insert([
            [
                'actor_id' => 1,
                'filename' => 'Brazil.png',
                'title' => null
            ],
            [
                'actor_id' => 1,
                'filename' => 'Colombia.png',
                'title' => null
            ],
            [
                'actor_id' => 1,
                'filename' => 'Guatemala.png',
                'title' => null
            ],
            [
                'actor_id' => 1,
                'filename' => 'Ethiopia.png',
                'title' => null
            ],
            [
                'actor_id' => 1,
                'filename' => 'Kenya.png',
                'title' => null
            ],
            [
                'actor_id' => 1,
                'filename' => 'Tanzania.png',
                'title' => null
            ]]);
    }
}
