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
        Schema::create('restaurant_contracts', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
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
        Schema::dropIfExists('restaurant_contracts');
    }
};
