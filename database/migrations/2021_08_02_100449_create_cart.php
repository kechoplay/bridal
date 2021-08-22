<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->nullable();
            $table->integer('product_id')->default(null)->nullable();
            $table->integer('number')->default(null)->nullable();
            $table->string('name')->default(null)->nullable();
            $table->string('slug')->default(null)->nullable();
            $table->string('image')->default(null)->nullable();
            $table->string('color')->default(null)->nullable();
            $table->integer('size')->default(null)->nullable();
            $table->integer('price')->default(null)->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
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
        Schema::dropIfExists('cart');
    }
}
