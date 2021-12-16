<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        $this->call(ContinentSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(OfficeSeeder::class);
        $this->call(VesselSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(BatchSeeder::class);
        $this->call(LaratrustSeeder::class);
    }
}
