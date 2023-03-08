<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seasons')->insert([
            ["id"=>1,"name"=>'{"en":"Flat"}'],
            ["id"=>2,"name"=>'{"en":"Low"}'],
            ["id"=>3,"name"=>'{"en":"Shoulder"}'],
            ["id"=>4,"name"=>'{"en":"High"}'],
            ["id"=>5,"name"=>'{"en":"Peak"}'],
            ["id"=>6,"name"=>'{"en":"Winter Promotion"}'],
            ["id"=>7,"name"=>'{"en":"Summer Promotion"}'],
        ]);

        DB::table('stars')->insert([
            ["id"=>1,"name"=>'{"en":"Flat"}'],
            ["id"=>2,"name"=>'{"en":"Low"}'],
            ["id"=>3,"name"=>'{"en":"Shoulder"}'],
            ["id"=>4,"name"=>'{"en":"High"}'],
            ["id"=>5,"name"=>'{"en":"Peak"}'],
            ["id"=>6,"name"=>'{"en":"Winter Promotion"}'],
            ["id"=>7,"name"=>'{"en":"Summer Promotion"}'],
        ]);
    }
}
