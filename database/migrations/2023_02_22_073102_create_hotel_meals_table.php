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
        Schema::create('hotel_meals', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->boolean('is_bb');
            $table->boolean('is_hb');
            $table->boolean('is_fb');
            $table->boolean('is_all_inc');
            $table->boolean('is_ro');
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
        Schema::dropIfExists('hotel_meals');
    }
};
