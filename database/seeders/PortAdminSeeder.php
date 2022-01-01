<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PortAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Alexandria Port Admin',
            'email' => '1.alexaport@alsafinat.net',
            'password' => Hash::make('password')
        ]);
        $user->attachRole(2);

        $user = User::create([
            'name' => 'Jeddah Islamic Admin',
            'email' => '2.jeddahport@alsafinat.net',
            'password' => Hash::make('password')
        ]);
        $user->attachRole(2);

        $user = User::create([
            'name' => 'Aden Port Admin',
            'email' => '3.adenport@alsafinat.net',
            'password' => Hash::make('password')
        ]);
        $user->attachRole(2);

        $user = User::create([
            'name' => 'Ad Duqam Port Admin',
            'email' => '4.adduqamport@alsafinat.net',
            'password' => Hash::make('password')
        ]);
        $user->attachRole(2);

        $user = User::create([
            'name' => 'Al Maqal Port Admin',
            'email' => '5.almaqalport@alsafinat.net',
            'password' => Hash::make('password')
        ]);
        $user->attachRole(2);

        $user = User::create([
            'name' => 'Chabahar Port Admin',
            'email' => '6.chabaharport@alsafinat.net',
            'password' => Hash::make('password')
        ]);
        $user->attachRole(2);

        $user = User::create([
            'name' => 'Khalifa Port Admin',
            'email' => '7.khalifaport@alsafinat.net',
            'password' => Hash::make('password')
        ]);
        $user->attachRole(2);

        $user = User::create([
            'name' => 'Karachi Port Admin',
            'email' => '8.karachiport@alsafinat.net',
            'password' => Hash::make('password')
        ]);
        $user->attachRole(2);

        $user = User::create([
            'name' => 'Jawaharlal Nehru Port Admin',
            'email' => '9.bombayport@alsafinat.net',
            'password' => Hash::make('password')
        ]);
        $user->attachRole(2);
    }
}
