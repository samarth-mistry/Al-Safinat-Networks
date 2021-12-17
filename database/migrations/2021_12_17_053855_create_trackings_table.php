<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id')->nullable();
            $table->integer('batch_id')->nullable();
            $table->integer('vessel_id')->nullable();
            $table->integer('curr_port_id')->nullable();
            $table->integer('next_port_id')->nullable();
            $table->enum('status', ['travelling', 'ported', 'deported', 'waiting', 'OOS', 'delivered'])->default('waiting');
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
        Schema::dropIfExists('trackings');
    }
}
