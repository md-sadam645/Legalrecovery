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
        Schema::create('viewed_links', function (Blueprint $table) {
            $table->id();
            $table->integer('link_id');
            $table->string('title');
            $table->mediumText('desc');
            $table->integer('user_id');
            $table->dateTime('last_viewed_date');
            $table->integer('viewed_count');
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
        Schema::dropIfExists('viewed_links');
    }
};
