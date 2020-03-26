<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConstraintsRecrutements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recrutements', function (Blueprint $table) {
            $table->foreign('demande_id')->references('id')->on('demandes');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->foreign('projet_id')->references('id')->on('projets');
            $table->foreign('poste_id')->references('id')->on('postes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recrutements', function (Blueprint $table) {
            $table->dropForeign(['demande_id']);
            $table->dropForeign(['categorie_id']);
            $table->dropForeign(['projet_id']);
            $table->dropForeign(['poste_id']);
        });
    }
}
