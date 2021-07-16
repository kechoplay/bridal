<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_program', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_vi')->default(null)->nullable();
            $table->string('name_en')->default(null)->nullable();
            $table->text('description_vi')->default(null)->nullable();
            $table->text('description_en')->default(null)->nullable();
            $table->integer('discount')->default(0)->nullable();
            $table->dateTime('start_time')->default(null)->nullable();
            $table->dateTime('end_time')->default(null)->nullable();
            $table->text('product_list')->default(null)->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_program');
    }
}
