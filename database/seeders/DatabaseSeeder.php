<?php

namespace Database\Seeders;

use App\Models\Continents;
use App\Models\Country;
use App\Models\City;
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
        $this->call(AdminModuleSeeder::class);
        $this->call(LaratrustSeeder::class);

        // User::create([
        //     'name' => 'Alizeh Nour-ud-Din',
        //     'email' => 'alizeh@algj.net',
        //     'password' => Hash::make('///'),
        // ]);

        // User::create([
        //     'name' => 'Larsha Nazakat',
        //     'email' => 'larsha@algj.net',
        //     'password' => Hash::make('///'),
        // ]);

        // User::create([
        //     'name' => 'Rania Tabrez',
        //     'email' => 'rania@algj.net',
        //     'password' => Hash::make('///'),
        // ]);
    }
}
