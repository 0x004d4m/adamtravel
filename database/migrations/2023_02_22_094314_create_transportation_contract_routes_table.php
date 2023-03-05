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
        Schema::create('transportation_contract_routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transportation_contract_id');
            $table->foreign('transportation_contract_id','tcr_tc_foreign')->references('id')->on('transportation_contracts');
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id')->references('id')->on('routes');
            $table->double('car_price');
            $table->double('van_price');
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
        Schema::dropIfExists('transportation_contract_routes');
    }
};
