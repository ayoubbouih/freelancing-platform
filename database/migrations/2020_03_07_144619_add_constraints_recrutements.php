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
            $table->foreign('id_demande')->references('id')->on('demandes');
            $table->foreign('id_categorie')->references('id')->on('categories');
            $table->foreign('id_projet')->references('id')->on('projets');
            $table->foreign('id_poste')->references('id')->on('postes');
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
            $table->dropForeign(['id_demande']);
            $table->dropForeign(['id_categorie']);
            $table->dropForeign(['id_projet']);
            $table->dropForeign(['id_poste']);
        });
    }
}
