<?php

namespace Database\Seeders;

use App\Models\Vessel;
use Illuminate\Database\Seeder;

class VesselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=5; $i++){
            $vessel = new Vessel();
            $vessel->name = "Vessel ".$i;
            $vessel->max_units = "200";
            $vessel->description = "Vessel #".$i;
            $vessel->save();
        }
    }
}
