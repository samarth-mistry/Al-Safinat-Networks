<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVesselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vessels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('vompany', 255);
            $table->integer('max_units');
            $table->string('description');
            $table->enum('status', ['travelling', 'ported', 'deported', 'waiting', 'OOS', 'ideal'])->default('ideal');
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
        Schema::dropIfExists('vessels');
    }
}
