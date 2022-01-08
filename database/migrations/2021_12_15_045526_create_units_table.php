<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('port_id');
            $table->integer('batch_id')->nullable();
            $table->integer('unit_size')->default(0);
            $table->integer('max_load');
            $table->string('description')->nullable();
            $table->enum('status', ['travelling', 'ported', 'deported', 'queued', 'dequeued', 'OOS', 'ideal'])->default('ideal');
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
        Schema::dropIfExists('units');
    }
}
