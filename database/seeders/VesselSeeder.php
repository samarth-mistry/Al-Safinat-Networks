<?php

namespace Database\Seeders;

use App\Models\Vessel;
use App\Models\VesselRoute;
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

            for($j=1, $k=2; $j<=4; $j++, $k++){
                if($i%2==0){
                    $route = new VesselRoute();
                    $route->vessel_id = $vessel->id;
                    $route->from_port = $j;
                    $route->to_port = $k;
                    $route->save();
                } else {
                    $route = new VesselRoute();
                    $route->vessel_id = $vessel->id;
                    $route->from_port = $k;
                    $route->to_port = $j;
                    $route->save();
                }
            }
        }
    }
}
