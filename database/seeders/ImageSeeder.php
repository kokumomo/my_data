<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'owner_id' => 1,
                'filename' => 'santos1.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 1,
                'filename' => 'santos2.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 1,
                'filename' => 'santos3.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 2,
                'filename' => 'emerald1.jpg',
                'title' => null
            ],
            [
                'owner_id' => 2,
                'filename' => 'emerald2.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 2,
                'filename' => 'emerald3.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 3,
                'filename' => 'antigua1.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 3,
                'filename' => 'antigua2.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 3,
                'filename' => 'antigua3.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 4,
                'filename' => 'blue1.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 4,
                'filename' => 'blue2.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 4,
                'filename' => 'blue3.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 5,
                'filename' => 'mocha1.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 5,
                'filename' => 'mocha2.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 5,
                'filename' => 'mocha3.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 6,
                'filename' => 'kilimanjaro1.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 6,
                'filename' => 'kilimanjaro2.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 6,
                'filename' => 'kilimanjaro3.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 7,
                'filename' => 'cristal1.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 7,
                'filename' => 'cristal2.jpeg',
                'title' => null
            ],
            [
                'owner_id' => 7,
                'filename' => 'cristal3.jpeg',
                'title' => null

            ]]);
    }
}