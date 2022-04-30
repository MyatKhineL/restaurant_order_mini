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
        DB::table('categories')->insert([
           "name"=>"Japanese Food"
        ]);
        DB::table('categories')->insert([
            "name"=>"Curry"
        ]);
        DB::table('categories')->insert([
            "name"=>"Juice"
        ]);
    }
}
