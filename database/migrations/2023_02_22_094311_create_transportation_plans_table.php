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
        Schema::create('transportation_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transportation_plan_default_id')->nullable();
            $table->foreign('transportation_plan_default_id')->references('id')->on('transportation_plan_defaults');
            $table->boolean('is_default')->default(false);
            $table->text('notes')->nullable();
            $table->integer('people_less_than');
            $table->integer('people_greater_than');
            $table->integer('free_pax_in_dbl');
            $table->integer('free_pax_in_sgl');
            $table->unsignedBigInteger('vehicle_type_id');
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types');
            $table->integer('number_of_vehicles');
            $table->unsignedBigInteger('transportation_company_id');
            $table->foreign('transportation_company_id')->references('id')->on('transportation_companies');
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
        Schema::dropIfExists('transportation_plans');
    }
};
