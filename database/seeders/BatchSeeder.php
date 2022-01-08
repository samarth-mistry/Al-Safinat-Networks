<?php

namespace Database\Seeders;

use App\Models\Batch;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    public function run()
    {
        $batch = new Batch();
        $batch->name = "V1-B1-12-2021";
        // $batch->vessel_id = "1";
        $batch->from_unit = "1";
        $batch->to_unit = "10";
        $batch->save();

        $batch = new Batch();
        $batch->name = "V1-B2-12-2021";
        // $batch->vessel_id = "2";
        $batch->from_unit = "10";
        $batch->to_unit = "20";
        $batch->save();

        $batch = new Batch();
        $batch->name = "V1-B3-12-2021";
        $batch->vessel_id = "1";
        $batch->from_unit = "10";
        $batch->to_unit = "20";
        $batch->save();

        $batch = new Batch();
        $batch->name = "V1-B4-12-2021";
        // $batch->vessel_id = "1";
        $batch->from_unit = "10";
        $batch->to_unit = "20";
        $batch->save();

        $batch = new Batch();
        $batch->name = "V1-B5-12-2021";
        // $batch->vessel_id = "1";
        $batch->from_unit = "10";
        $batch->to_unit = "20";
        $batch->save();

        $batch = new Batch();
        $batch->name = "V1-B6-12-2021";
        // $batch->vessel_id = "1";
        $batch->from_unit = "10";
        $batch->to_unit = "20";
        $batch->save();
    }
}
