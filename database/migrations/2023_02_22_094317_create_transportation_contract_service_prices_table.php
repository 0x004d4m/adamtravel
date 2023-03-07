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
        Schema::create('transportation_contract_service_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transportation_contract_service_id');
            $table->foreign('transportation_contract_service_id','tcServiceP_tcs_foreign')->references('id')->on('transportation_contract_services');
            $table->unsignedBigInteger('vehicle_type_id');
            $table->foreign('vehicle_type_id','vcServiceP_tt_foreign')->references('id')->on('vehicle_types');
            $table->double('price');
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
        Schema::dropIfExists('transportation_contract_service_prices');
    }
};
