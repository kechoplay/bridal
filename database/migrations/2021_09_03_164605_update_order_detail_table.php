<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('order_detail', function (Blueprint $table) {
            $table->string('size')->after('price')->default(0)->nullable();
            $table->string('color1')->after('size')->default(0)->nullable();
            $table->string('color2')->after('color1')->default(0)->nullable();
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
        Schema::table('order_detail', function($table) {
            $table->dropColumn('size');
            $table->dropColumn('color1');
            $table->dropColumn('color2');
        });
    }
}
