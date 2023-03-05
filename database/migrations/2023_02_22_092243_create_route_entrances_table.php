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
        Schema::create('route_entrances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id')->references('id')->on('routes');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->unsignedBigInteger('entrance_id')->nullable();
            $table->foreign('entrance_id')->references('id')->on('entrances');
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
        Schema::dropIfExists('route_entrances');
    }
};
