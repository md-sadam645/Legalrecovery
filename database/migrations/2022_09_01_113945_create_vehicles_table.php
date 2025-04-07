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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('chasisnum')->nullable();
            $table->string('registration_numbers')->nullable();
            $table->string('enginenum')->nullable();
            $table->string('allocation')->nullable();
            $table->string('agreementid')->nullable();
            $table->string('username')->nullable();
            $table->string('emi_amt')->nullable();
            $table->string('pos')->nullable();
            $table->string('tbr')->nullable();
            $table->string('bkts')->nullable();
            $table->string('bank')->nullable();
            $table->string('productname')->nullable();
            $table->string('model')->nullable();
            $table->string('address')->nullable();
            $table->integer('file_id');
            $table->integer('add_by');
            $table->string('add_by_name');
            $table->integer('status')->default(1);
            $table->integer('db_version')->default(1);
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
        Schema::dropIfExists('vehicles');
    }
};
