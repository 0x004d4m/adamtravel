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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->unsignedBigInteger('star_id');
            $table->foreign('star_id')->references('id')->on('stars');
            $table->string('tel')->nullable();
            $table->string('fax')->nullable();
            $table->string('mobile')->nullable();
            $table->string('emergency_number')->nullable();
            $table->string('email')->nullable();
            $table->text('website')->nullable();
            $table->string('contact')->nullable();
            $table->string('p_o_box')->nullable();
            $table->string('address')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
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
        Schema::dropIfExists('hotels');
    }
};
