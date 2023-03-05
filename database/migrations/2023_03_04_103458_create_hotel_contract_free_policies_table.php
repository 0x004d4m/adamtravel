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
        Schema::create('hotel_contract_free_policies', function (Blueprint $table) {
            $table->id();
            $table->integer('number_of_free_pax');
            $table->boolean('is_single_room')->default(false);
            $table->boolean('is_sharing_double_room')->default(false);
            $table->integer('every');
            $table->boolean('is_pax')->default(false);
            $table->boolean('is_room')->default(false);
            $table->integer('maximum');
            $table->unsignedBigInteger('hotel_contract_id');
            $table->foreign('hotel_contract_id')->references('id')->on('hotel_contracts');
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
        Schema::dropIfExists('hotel_contract_free_policies');
    }
};
