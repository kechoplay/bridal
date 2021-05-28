<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDressProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dress_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->integer('price')->nullable();
            $table->integer('sale_price')->nullable()->default(0);
            $table->text('description')->nullable();
            $table->text('img_path')->nullable();
            $table->integer('style')->default(0);
            $table->integer('status')->default(0)->comment('0:thường/1:sản phẩm hot/2:sản phẩm đặc biệt');
            $table->integer('category_id');
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
        Schema::dropIfExists('dress_product');
    }
}
