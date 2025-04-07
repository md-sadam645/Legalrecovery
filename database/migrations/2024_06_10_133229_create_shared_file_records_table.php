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
        Schema::create('shared_file_records', function (Blueprint $table) {
            $table->id();
            $table->integer('share_from');
            $table->string('share_from_name');
            $table->integer('share_to');
            $table->string('share_to_name');
            $table->integer('file_id');
            $table->string('filename');
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
        Schema::dropIfExists('shared_file_records');
    }
};
