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
            $table->enum('room',[1,2])->default(1);// 1=>single room, 2=>sharing double room
            $table->integer('every');
            $table->enum('type',[1,2])->default(1);// 1=>pax, 2=>room
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
