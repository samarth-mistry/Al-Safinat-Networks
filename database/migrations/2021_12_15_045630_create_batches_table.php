<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('annual_id')->nullable();
            $table->integer('vessel_id')->nullable();
            $table->integer('from_unit');
            $table->integer('to_unit');
            $table->string('description')->nullable();
            $table->enum('status', ['travelling', 'loaded', 'unloaded', 'waiting', 'OOS', 'ideal'])->default('ideal');
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
        Schema::dropIfExists('batches');
    }
}
