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
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->double('daily_rate')->default(0);
            $table->double('accommodation_rate')->default(0);
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
        Schema::dropIfExists('guides');
    }
};
