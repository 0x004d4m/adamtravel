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
        Schema::create('restaurant_contract_meals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_contract_id')->nullable();
            $table->foreign('restaurant_contract_id')->references('id')->on('restaurant_contracts');
            $table->unsignedBigInteger('restaurant_meal_id')->nullable();
            $table->foreign('restaurant_meal_id')->references('id')->on('restaurant_meals');
            $table->integer('adult_cost');
            $table->integer('child_cost');
            $table->json('description');
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
        Schema::dropIfExists('restaurant_contract_meals');
    }
};
