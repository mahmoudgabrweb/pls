<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreateCountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::unprepared(file_get_contents(public_path() . "/sql/countries.sql"));
    }
}
