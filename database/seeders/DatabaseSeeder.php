<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\TableTableSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\DishesSeeder;

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
        $this->call([
//           UserTableSeeder::class,
           TableTableSeeder::class,
             CategorySeeder::class,
//             DishesSeeder::class,
        ]);
    }
}
