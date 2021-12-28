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
        $city->name = "Cario";
        $city->abbr = "CR";
        $city->country_id = "1";
        $city->save();

        $city = new City();
        $city->name = "Jeddah";
        $city->abbr = "JDH";
        $city->country_id = "2";
        $city->save();

        $city = new City();
        $city->name = "Aden";
        $city->abbr = "ADN";
        $city->country_id = "3";
        $city->save();

        $city = new City();
        $city->name = "Muscat";
        $city->abbr = "MSC";
        $city->country_id = "4";
        $city->save();

        $city = new City();
        $city->name = "Baghdad";
        $city->abbr = "BDD";
        $city->country_id = "5";
        $city->save();

        $city = new City();
        $city->name = "Tehran";
        $city->abbr = "THR";
        $city->country_id = "6";
        $city->save();

        $city = new City();
        $city->name = "Abu Dhabi";
        $city->abbr = "ADB";
        $city->country_id = "7";
        $city->save();

        $city = new City();
        $city->name = "Karachi";
        $city->abbr = "KRC";
        $city->country_id = "8";
        $city->save();

        $city = new City();
        $city->name = "Mumbai";
        $city->abbr = "BMB";
        $city->country_id = "9";
        $city->save();

        $city = new City();
        $city->name = "Dubai";
        $city->abbr = "DBI";
        $city->country_id = "7";
        $city->save();

        $city = new City();
        $city->name = "Islamabad";
        $city->abbr = "ISM";
        $city->country_id = "8";
        $city->save();

        $city = new City();
        $city->name = "Liverpool";
        $city->abbr = "LPL";
        $city->country_id = "10";
        $city->save();
    }
}
