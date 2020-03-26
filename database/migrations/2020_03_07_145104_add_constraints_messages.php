<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('id_conversation')->references('id')->on('conversations');
            $table->foreign('id_envoyeur')->references('id')->on('users');
            $table->foreign('id_recepteur')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['id_conversation']);
            $table->dropForeign(['id_envoyeur']);
            $table->dropForeign(['id_recepteur']);
        });
    }
}
