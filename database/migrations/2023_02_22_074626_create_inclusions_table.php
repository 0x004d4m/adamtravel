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
        Schema::create('inclusions', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->boolean('is_exclusion')->default(false);
            $table->unsignedBigInteger('inclusion_default_id')->nullable();
            $table->foreign('inclusion_default_id')->references('id')->on('inclusion_defaults');
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
        Schema::dropIfExists('default_inclusions');
    }
};
