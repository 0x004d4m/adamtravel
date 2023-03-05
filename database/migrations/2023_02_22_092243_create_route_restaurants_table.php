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
        Schema::create('route_restaurants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id')->references('id')->on('routes');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->unsignedBigInteger('restaurant_contract_meal_id');
            $table->foreign('restaurant_contract_meal_id')->references('id')->on('restaurant_contract_meals');
            $table->boolean('is_breakfast')->default(false);
            $table->boolean('is_lunch')->default(false);
            $table->boolean('is_dinner')->default(false);
            $table->boolean('is_optional')->default(false);
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
        Schema::dropIfExists('route_restaurants');
    }
};
