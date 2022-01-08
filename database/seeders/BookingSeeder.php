<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booking = new Booking();
        $booking->is_own = 1;
        $booking->owner_name = "Jalal Ahmed Khan";
        $booking->proof_id = "AZIFO8460";
        $booking->country_id = "1";
        $booking->source_address = "Peshawar, Pakistan";
        $booking->source_email = "jll@pesh.pk";
        $booking->source_phone = "123";
        $booking->unit_size = "1";
        $booking->source_country_id = "1";
        $booking->source_port_id = "1";
        $booking->s_date_of_arrival = "20-Dec-2021";
        $booking->material_type_id = "3";
        $booking->weight = "200";
        $booking->d_l = "50";
        $booking->d_w = "50";
        $booking->d_h = "50";
        $booking->sensitivity = 0;
        $booking->destination_country_id = "9";
        $booking->destination_port_id = "3";
        $booking->destination_address = "Shenzen, HK, CN";
        $booking->save();

        $booking = new Booking();
        $booking->is_own = 1;
        $booking->owner_name = "Lee Wuina";
        $booking->proof_id = "AZIFO8460";
        $booking->country_id = "1";
        $booking->source_address = "Shanghai, CN";
        $booking->source_email = "lee@shg.cn";
        $booking->source_phone = "123";
        $booking->unit_size = "0";
        $booking->source_country_id = "9";
        $booking->source_port_id = "3";
        $booking->s_date_of_arrival = "25-Dec-2021";
        $booking->material_type_id = "3";
        $booking->weight = "200";
        $booking->d_l = "50";
        $booking->d_w = "50";
        $booking->d_h = "50";
        $booking->sensitivity = 0;
        $booking->destination_country_id = "1";
        $booking->destination_port_id = "1";
        $booking->destination_address = "Karachi, PK";
        $booking->save();
    }
}
