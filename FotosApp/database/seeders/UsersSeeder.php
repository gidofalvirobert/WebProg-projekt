<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'=> 'Gidofalvi Robert',
            'proles_id'=>1,
            'password'=>bcrypt('Robi123'),
            'tel'=>'0747775878',
            'country'=>'Romania',
            'locality'=>'Balan',
            'adress'=>'str. Florilor, bl. 36, sc.1, ap.9',

        ]);
        DB::table('users')->insert([
            'username'=> 'Kukor Ica',
            'proles_id'=>2,
            'password'=>bcrypt('popcorn'),
            'tel'=>'0787775573',
            'country'=>'Romania',
            'locality'=>'Karcfalva',
            'adress'=>'str. Alszeg, nr.55',
        ]);
    }
}
