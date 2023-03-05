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
        Schema::create('hotel_contract_notes', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description');
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
        Schema::dropIfExists('hotel_contract_notes');
    }
};
