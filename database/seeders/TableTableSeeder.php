<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tables')->insert([
          "number"=>1,
        ]);
        DB::table('tables')->insert([
            "number"=>2,
        ]);
        DB::table('tables')->insert([
            "number"=>3,
        ]);
        DB::table('tables')->insert([
            "number"=>4,
        ]);
        DB::table('tables')->insert([
            "number"=>5,
        ]);

    }
}
