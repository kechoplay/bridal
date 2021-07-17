<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShippingMethod extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_method', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ship_name_vi')->default(null)->nullable();
            $table->string('ship_name_en')->default(null)->nullable();
            $table->string('ship_time_vi')->default(null)->nullable();
            $table->string('ship_time_en')->default(null)->nullable();
            $table->integer('ship_fee')->default(null)->nullable();
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
        Schema::dropIfExists('table_shipping_method');
    }
}
