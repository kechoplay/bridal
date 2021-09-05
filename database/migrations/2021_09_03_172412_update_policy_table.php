<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePolicyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('policy', function (Blueprint $table) {
            $table->string('facebook')->after('introduce')->nullable();
            $table->string('instagram')->after('facebook')->nullable();
            $table->string('website')->after('instagram')->nullable();
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
        Schema::table('policy', function($table) {
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
            $table->dropColumn('website');
        });
    }
}
