<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->integer('city_id');
            $table->boolean('type_id')->default(1);//0-port_office, 1-city_office
            $table->integer('country_id');
            $table->string('address', 255);
            $table->integer('phone');
            $table->string('email_import', 255);
            $table->string('email_export', 255)->nullable();
            $table->string('opening_time', 255)->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('offices');
    }
}
