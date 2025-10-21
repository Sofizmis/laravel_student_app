<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;


class CitySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cities')->insert([
            'name' => "Mariupol",
        ]);

        DB::table('cities')->insert([
            'name' => "Rostov-on-don",
        ]);

        DB::table('cities')->insert([
            'name' => "Donetsk",
        ]);

    }
}