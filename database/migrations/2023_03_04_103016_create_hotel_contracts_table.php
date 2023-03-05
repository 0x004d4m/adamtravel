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
        Schema::create('hotel_contracts', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->double('group_rate');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_contracts');
    }
};
