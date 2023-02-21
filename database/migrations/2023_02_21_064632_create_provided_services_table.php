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
        Schema::create('provided_services', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description');
            $table->double('child_per_person');
            $table->double('child_per_groub');
            $table->double('adult_per_groub');
            $table->double('adult_per_person');
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
        Schema::dropIfExists('provided_services');
    }
};
