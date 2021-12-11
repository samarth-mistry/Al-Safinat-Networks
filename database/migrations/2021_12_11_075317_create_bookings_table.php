<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_own')->default(1);
            $table->string('owner_name', 255);
            $table->string('proof_id', 255);
            $table->integer('country_id');
            $table->string('source_address', 255);
            $table->string('source_email', 255);
            $table->string('source_phone', 255);

            $table->boolean('unit_size')->default(0);
            $table->integer('source_country_id');
            $table->integer('source_port_id');
            $table->string('s_date_of_arrival', 10);

            $table->integer('material_type_id');
            $table->integer('weight');
            $table->integer('d_l');
            $table->integer('d_w');
            $table->integer('d_h');
            $table->boolean('unit_size')->default(0);

            $table->integer('destination_country_id');
            $table->integer('destination_port_id');
            $table->string('d_date_of_arrival_approx', 10);
            $table->string('destination_address', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
