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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->json('name');
            $table->json('description');
            $table->string('kilometers');
            $table->text('image');
            $table->unsignedBigInteger('transportation_service_id');
            $table->foreign('transportation_service_id')->references('id')->on('transportation_services');
            $table->boolean('has_driver_accommodation');
            $table->unsignedBigInteger('guide_id');
            $table->foreign('guide_id')->references('id')->on('guides');
            $table->boolean('has_guide_accommodation');
            $table->unsignedBigInteger('route_group_id');
            $table->foreign('route_group_id')->references('id')->on('route_groups');
            $table->unsignedBigInteger('starting_city_id');
            $table->foreign('starting_city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('overnight_city_id');
            $table->foreign('overnight_city_id')->references('id')->on('cities');
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
        Schema::dropIfExists('default_routes');
    }
};
