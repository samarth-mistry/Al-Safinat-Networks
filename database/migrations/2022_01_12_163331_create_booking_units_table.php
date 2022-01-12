<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_units', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id');
            $table->integer('unit_id')->nullable();
            $table->integer('batch_id')->nullable();
            $table->integer('vessel_id')->nullable();
            $table->enum('status', ['batched', 'unbatched', 'waiting', 'OOS'])->default('waiting');
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
        Schema::dropIfExists('booking_units');
    }
}
