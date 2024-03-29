<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsPostes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postes', function (Blueprint $table) {
            $table->foreign('projet_id')->references('id')->on('projets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postes', function (Blueprint $table) {
            $table->dropForeign(['projet_id']);
        });
    }
}
