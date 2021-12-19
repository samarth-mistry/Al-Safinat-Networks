<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City();
        $city->name = "Karachi";
        $city->abbr = "KRC";
        $city->country_id = "1";
        $city->save();

        $city = new City();
        $city->name = "Abu Dhabi";
        $city->abbr = "ABD";
        $city->country_id = "2";
        $city->save();

        $city = new City();
        $city->name = "Aden";
        $city->abbr = "ADN";
        $city->country_id = "3";
        $city->save();

        $city = new City();
        $city->name = "Jeddah";
        $city->abbr = "JDH";
        $city->country_id = "4";
        $city->save();

        $city = new City();
        $city->name = "Bandar-e-Baber";
        $city->abbr = "BEB";
        $city->country_id = "5";
        $city->save();

        $city = new City();
        $city->name = "Cape Town";
        $city->abbr = "CPT";
        $city->country_id = "6";
        $city->save();

        $city = new City();
        $city->name = "Liverpool";
        $city->abbr = "LPL";
        $city->country_id = "7";
        $city->save();

        $city = new City();
        $city->name = "Denmark";
        $city->abbr = "DNM";
        $city->country_id = "8";
        $city->save();

        $city = new City();
        $city->name = "Shanghai";
        $city->abbr = "SHG";
        $city->country_id = "9";
        $city->save();
        $city = new City();
        $city->name = "Hong Kong";
        $city->abbr = "HK";
        $city->country_id = "9";
        $city->save();

        $city = new City();
        $city->name = "Islamabad";
        $city->abbr = "ISM";
        $city->country_id = "1";
        $city->save();

        $city = new City();
        $city->name = "Porbander";
        $city->abbr = "PRD";
        $city->country_id = "10";
        $city->save();
    }
}
