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
        Schema::create('account_categories', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->unsignedBigInteger('account_category_type_id');
            $table->foreign('account_category_type_id')->references('id')->on('account_category_types');
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
        Schema::dropIfExists('account_categories');
    }
};
