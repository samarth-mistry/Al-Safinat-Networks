<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new Country();
        $country->name = "Egypt";
        $country->abbr = "EGY";
        $country->continent_id = "1";
        $country->save();

        $country = new Country();
        $country->name = "Saudi Arabia";
        $country->abbr = "KSA";
        $country->continent_id = "1";
        $country->save();

        $country = new Country();
        $country->name = "Yemen";
        $country->abbr = "YMN";
        $country->continent_id = "1";
        $country->save();

        $country = new Country();
        $country->name = "Oman";
        $country->abbr = "OMN";
        $country->continent_id = "1";
        $country->save();

        $country = new Country();
        $country->name = "Iraq";
        $country->abbr = "IRQ";
        $country->continent_id = "1";
        $country->save();

        $country = new Country();
        $country->name = "Iran";
        $country->abbr = "IRN";
        $country->continent_id = "1";
        $country->save();

        $country = new Country();
        $country->name = "Arab Emirate";
        $country->abbr = "UAE";
        $country->continent_id = "1";
        $country->save();

        $country = new Country();
        $country->name = "Pakistan";
        $country->abbr = "IRP";
        $country->continent_id = "1";
        $country->save();

        $country = new Country();
        $country->name = "India";
        $country->abbr = "IND";
        $country->continent_id = "1";
        $country->save();

        $country = new Country();
        $country->name = "England";
        $country->abbr = "GBR";
        $country->continent_id = "3";
        $country->save();

        $country = new Country();
        $country->name = "Denmark";
        $country->abbr = "DNM";
        $country->continent_id = "3";
        $country->save();

        $country = new Country();
        $country->name = "China";
        $country->abbr = "CN";
        $country->continent_id = "4";
        $country->save();
    }
}
