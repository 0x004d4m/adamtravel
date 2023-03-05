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
        Schema::create('hotel_contract_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_contract_id');
            $table->foreign('hotel_contract_id')->references('id')->on('hotel_contracts');
            $table->unsignedBigInteger('season_id');
            $table->foreign('season_id')->references('id')->on('seasons');
            $table->double('double');
            $table->double('single_supplement');
            $table->double('third_person');
            $table->double('breakfast');
            $table->double('lunch');
            $table->double('dinner');
            $table->double('all_inc');
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
        Schema::dropIfExists('hotel_contract_rates');
    }
};
