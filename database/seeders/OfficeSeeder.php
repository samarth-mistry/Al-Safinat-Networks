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
        $office->name = "Great Alexendria Port";
        $office->type_id = "0";
        $office->city_id = "1";
        $office->country_id = "1";
        $office->address = "Internation Port of Egypt";
        $office->email_import = "port@krc.pk";
        $office->email_export = "port@krc.pk";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "Jeddah Islamic Port";
        $office->type_id = "0";
        $office->city_id = "2";
        $office->country_id = "2";
        $office->address = "Internation Port of KSA";
        $office->email_import = "port@krc.cn";
        $office->email_export = "port@krc.cn";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "Aden Port";
        $office->type_id = "0";
        $office->city_id = "3";
        $office->country_id = "3";
        $office->address = "Internation Port YMN";
        $office->email_import = "port@hk.gj";
        $office->email_export = "port@hk.gj";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "Ad-Duqam Port";
        $office->type_id = "0";
        $office->city_id = "4";
        $office->country_id = "4";
        $office->address = "Internation Port of OMN";
        $office->email_import = "port@hk.gj";
        $office->email_export = "port@hk.gj";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "Al-Maqal Port";
        $office->type_id = "0";
        $office->city_id = "5";
        $office->country_id = "5";
        $office->address = "Internation Port of IRQ";
        $office->email_import = "port@hk.gj";
        $office->email_export = "port@hk.gj";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "Chabahar Port";
        $office->type_id = "0";
        $office->city_id = "6";
        $office->country_id = "6";
        $office->address = "Internation Port of IRN";
        $office->email_import = "port@hk.gj";
        $office->email_export = "port@hk.gj";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "Khalifa Port";
        $office->type_id = "0";
        $office->city_id = "7";
        $office->country_id = "7";
        $office->address = "Internation Port of UAE";
        $office->email_import = "port@hk.gj";
        $office->email_export = "port@hk.gj";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "Karachi Port";
        $office->type_id = "0";
        $office->city_id = "8";
        $office->country_id = "8";
        $office->address = "Internation Port of PAK";
        $office->email_import = "port@hk.gj";
        $office->email_export = "port@hk.gj";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "Jawaharlal Nehru Port";
        $office->type_id = "0";
        $office->city_id = "9";
        $office->country_id = "9";
        $office->address = "Internation Port of IND";
        $office->email_import = "port@hk.gj";
        $office->email_export = "port@hk.gj";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        //NON --ports
        $office = new Office();
        $office->name = "Pak HQ";
        $office->type_id = "1";
        $office->city_id = "8";
        $office->country_id = "8";
        $office->address = "High court, ISM, PK";
        $office->email_import = "hq@krc.pk";
        $office->email_export = "hq@krc.pk";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();

        $office = new Office();
        $office->name = "UAE HQ";
        $office->type_id = "1";
        $office->city_id = "7";
        $office->country_id = "7";
        $office->address = "HQ Shanghai, CN";
        $office->email_import = "port@krc.cn";
        $office->email_export = "port@krc.cn";
        $office->phone = "123";
        $office->opening_time = "09:00AM - 06:00PM";
        $office->save();
    }
}
