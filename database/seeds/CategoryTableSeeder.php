<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::insert([
            [
                'name' => 'Politics',
            ],
            [
                'name' => 'Valley',
            ],
            [
                'name' => 'Sports',
            ],
            [
                'name' => 'National',
            ],
            [
                'name' => 'Cultural & Arts',
            ],
            [
                'name' => 'Money',
            ]
        ]);
    }
}
