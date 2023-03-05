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
        Schema::create('route_visit_extras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('route_visit_id');
            $table->foreign('route_visit_id')->references('id')->on('route_visits');
            $table->unsignedBigInteger('visit_extra_id');
            $table->foreign('visit_extra_id')->references('id')->on('visit_extras');
            $table->boolean('is_extra')->default(false);
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
        Schema::dropIfExists('route_extras');
    }
};
