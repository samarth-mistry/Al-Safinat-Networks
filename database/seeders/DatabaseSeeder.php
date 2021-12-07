<?php

namespace Database\Seeders;

use App\Models\Continents;
use App\Models\Country;
use App\Models\City;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $continent = new Continents();
        $continent->name = 'South East Asia';
        $continent->abbr = "SEA";
        $continent->coordinates = "24N 89E";
        $continent->remarks = "SEA remarks";
        $continent->save();
        
        $continent = new Continents();
        $continent->name = 'Far East';
        $continent->abbr = "FE";
        $continent->coordinates = "54N 49E";
        $continent->remarks = "FE remarks";
        $continent->save();

        $country = new Country();
        $country->name = "Pakistan";
        $country->abbr = "IRP";
        $country->continent_id = "1";
        $country->save();

        $country = new Country();
        $country->name = "Arab Emirate";
        $country->abbr = "UAE";
        $country->continent_id = "1";
        $country->save();

        $city = new City();
        $city->name = "Umarkot";
        $city->abbr = "UMK";
        $city->country_id = "1";
        $city->save();

        $city = new City();
        $city->name = "Abu Dhabi";
        $city->abbr = "ABD";
        $city->country_id = "2";
        $city->save();
    }
}
