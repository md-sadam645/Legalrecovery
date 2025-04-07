<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_letters', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("admin_id");
            $table->integer("vehicle_id");
            $table->string("station_name");
            $table->string("city_name");
            $table->string("pincode");
            $table->string("link");
            $table->string("envolop_link");
            $table->integer("status")->comment("0=pending,1=approved,2=rejected");
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
        Schema::dropIfExists('request_letters');
    }
};
