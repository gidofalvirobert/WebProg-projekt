<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proles')->insert([
            'nev'=> 'admin',
        ]);
        DB::table('proles')->insert([
            'nev'=> 'client',
        ]);
    }
}
