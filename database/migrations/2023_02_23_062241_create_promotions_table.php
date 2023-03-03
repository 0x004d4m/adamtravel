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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->boolean('is_only_ro')->default(false);
            $table->boolean('is_inc_bb')->default(false);
            $table->boolean('is_inc_hb')->default(false);
            $table->boolean('is_inc_fb')->default(false);
            $table->boolean('is_inc_all')->default(false);
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
        Schema::dropIfExists('promotions');
    }
};
