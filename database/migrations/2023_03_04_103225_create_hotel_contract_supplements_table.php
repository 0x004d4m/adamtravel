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
        Schema::create('hotel_contract_supplements', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->unsignedBigInteger('hotel_contract_id');
            $table->foreign('hotel_contract_id')->references('id')->on('hotel_contracts');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->boolean('is_optional')->default(false);
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
        Schema::dropIfExists('hotel_contract_supplements');
    }
};
