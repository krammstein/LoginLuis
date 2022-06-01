<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        /**
         * Generate all users test
         */
        User::factory()->create([
             'name' => 'Luis Dirceu Velázquez Fuentes',
             'email' => 'krammstein@gmail.com',
             'status' => User::STATUS_ACTIVE,
        ]);

        User::factory(25)->create();
    }
}
