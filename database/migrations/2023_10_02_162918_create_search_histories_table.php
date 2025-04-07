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
        Schema::create('search_histories', function (Blueprint $table) {
            $table->id();
            $table->string('registration_numbers');
            $table->string('chasisnum');
            $table->string('enginenum');
            $table->date('date');
            $table->time('time');
            $table->integer('user_id');
            $table->string('user_name');
            $table->integer('admin_id')->nullable();
            $table->string('admin_name')->nullable();
            $table->integer('add_by');
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
        Schema::dropIfExists('search_histories');
    }
};
