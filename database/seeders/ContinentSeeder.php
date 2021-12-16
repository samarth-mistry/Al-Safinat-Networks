<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Continents;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $continent = new Continents();
        $continent->name = 'South East Asia';
        $continent->abbr = "SEA";
        $continent->coordinates = "24N 89E";
        $continent->save();

        $continent = new Continents();
        $continent->name = 'Africa';
        $continent->abbr = "AFR";
        $continent->coordinates = "24N 89E";
        $continent->save();

        $continent = new Continents();
        $continent->name = 'Europe';
        $continent->abbr = "EU";
        $continent->coordinates = "24N 89E";
        $continent->save();
        
        $continent = new Continents();
        $continent->name = 'Far East';
        $continent->abbr = "FE";
        $continent->coordinates = "54N 49E";
        $continent->save();
    }
}
