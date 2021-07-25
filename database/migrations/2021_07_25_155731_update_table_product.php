<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('dress_product', function (Blueprint $table) {
            $table->string('name_en')->after('name')->default(null)->nullable();
            $table->integer('color1')->after('name_en')->default(null)->nullable();
            $table->integer('color2')->after('color1')->default(null)->nullable();
            $table->integer('size')->after('color2')->default(null)->nullable();
            $table->string('process_time')->after('size')->default(null)->nullable();
            $table->string('description_en')->after('description')->default(null)->nullable();
            $table->string('price_en')->after('price')->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('dress_product', function (Blueprint $table) {
           $table->dropColumn(['name_en', 'color1', 'color2', 'size', 'process_time', 'description_en', 'price_en']);
        });
    }
}
