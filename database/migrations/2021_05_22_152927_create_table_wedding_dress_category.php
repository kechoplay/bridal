<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWeddingDressCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_dress_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('img_category')->nullable();
            $table->string('slug')->nullable();
            $table->integer('parent')->nullable()->default(0);
            $table->integer('status')->nullable()->default(1);
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
        Schema::dropIfExists('wedding_dress_category');
    }
}
