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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description')->nullable();
            $table->json('visit_duration')->nullable();
            $table->json('opening_hours')->nullable();
            $table->text('website')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('service_classification_id');
            $table->foreign('service_classification_id')->references('id')->on('service_classifications');
            $table->boolean('is_excursion')->default(false);
            $table->boolean('is_per_group')->default(false);
            $table->integer('group_price_per_adult')->nullable();
            $table->integer('group_price_per_child')->nullable();
            $table->boolean('is_per_person')->default(false);
            $table->boolean('is_per_capacity')->default(false);
            $table->integer('capacity')->nullable();
            // $table->integer('capacity_price_per_child')->nullable();
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
        Schema::dropIfExists('services');
    }
};
