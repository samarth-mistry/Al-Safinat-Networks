<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Office;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $office = new Office();
        $office->name = "Karachi Port";
        $office->type_id = "0";
        $office->city_id = "1";
        $office->country_id = "1";
        $office->address = "Internation Port of Karchi, PK";
        $office->email_import = "port@krc.pk";
        $office->email_export = "port@krc.pk";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "Shanghai Port";
        $office->type_id = "0";
        $office->city_id = "9";
        $office->country_id = "9";
        $office->address = "Internation Port of Shanghai, CN";
        $office->email_import = "port@krc.cn";
        $office->email_export = "port@krc.cn";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "Kandala Port";
        $office->type_id = "0";
        $office->city_id = "12";
        $office->country_id = "10";
        $office->address = "Internation Port of GUJARAT";
        $office->email_import = "port@hk.gj";
        $office->email_export = "port@hk.gj";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "Al-Damman Port";
        $office->type_id = "0";
        $office->city_id = "4";
        $office->country_id = "4";
        $office->address = "Internation Port of Saudi Arabia, Jeddah";
        $office->email_import = "port@hk.gj";
        $office->email_export = "port@hk.gj";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "Al-Emirate Port";
        $office->type_id = "0";
        $office->city_id = "2";
        $office->country_id = "2";
        $office->address = "Internation Port of UAE";
        $office->email_import = "port@hk.gj";
        $office->email_export = "port@hk.gj";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();


        //NON --ports
        $office = new Office();
        $office->name = "Pak HQ";
        $office->type_id = "1";
        $office->city_id = "1";
        $office->country_id = "1";
        $office->address = "High court, ISM, PK";
        $office->email_import = "hq@krc.pk";
        $office->email_export = "hq@krc.pk";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "Beijing HQ";
        $office->type_id = "1";
        $office->city_id = "9";
        $office->country_id = "9";
        $office->address = "HQ Shanghai, CN";
        $office->email_import = "port@krc.cn";
        $office->email_export = "port@krc.cn";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();
    }
}
