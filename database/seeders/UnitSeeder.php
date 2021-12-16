<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=10; $i++){
            $unit = new Unit();
            $unit->name = "KRC400".$i;
            $unit->unit_size = "1";
            $unit->port_id = "1";
            $unit->max_load = "140";
            $unit->save();
        }
        for($i=1; $i<=10; $i++){
            $unit = new Unit();
            $unit->name = "KRC200".$i;
            $unit->unit_size = "0";
            $unit->port_id = "1";
            $unit->max_load = "140";
            $unit->save();
        }
    }
}
