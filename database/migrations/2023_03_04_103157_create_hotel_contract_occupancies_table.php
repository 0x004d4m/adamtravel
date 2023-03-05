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
        Schema::create('hotel_contract_occupancies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_contract_id');
            $table->foreign('hotel_contract_id')->references('id')->on('hotel_contracts');
            $table->unsignedBigInteger('room_type_id');
            $table->foreign('room_type_id')->references('id')->on('room_types');
            $table->integer('max_adults')->default(0);
            $table->integer('max_children')->default(0);
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('hotel_contract_occupancies');
    }
};
