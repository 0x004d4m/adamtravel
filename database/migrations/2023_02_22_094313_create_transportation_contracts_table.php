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
        Schema::create('transportation_contracts', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->unsignedBigInteger('transportation_company_id');
            $table->foreign('transportation_company_id')->references('id')->on('transportation_companies');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->double('driver_accommodation')->default(0);
            $table->double('commission')->default(0);
            $table->enum('price_type',[1,2])->default(1);// 1=>by service, 2=>by route
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
        Schema::dropIfExists('transportation_contracts');
    }
};
