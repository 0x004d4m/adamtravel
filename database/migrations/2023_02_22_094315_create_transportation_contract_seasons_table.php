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
        Schema::create('transportation_contract_seasons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transportation_contract_id');
            $table->foreign('transportation_contract_id','tcs_tc_foreign')->references('id')->on('transportation_contracts');
            $table->unsignedBigInteger('season_id');
            $table->foreign('season_id')->references('id')->on('seasons');
            $table->date('starting_date');
            $table->date('ending_date');
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
        Schema::dropIfExists('transportation_contract_seasons');
    }
};
