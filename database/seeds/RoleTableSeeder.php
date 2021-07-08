<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::insert([
            [
                'type' => 'admin',
            ],
            [
                'type' => 'editor',
            ],
            [
                'type' => 'writer',
            ],
            [
                'type' => 'customer',
            ]
        ]);
    }
}
