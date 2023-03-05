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
            $table->unsignedBigInteger('transportation_type_id');
            $table->foreign('transportation_type_id','tcServiceP_tt_foreign')->references('id')->on('transportation_types');
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
