<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecrutementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recrutements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('demande_id');
            $table->unsignedBigInteger('poste_id');
            $table->string('status',25)->default('en cours');
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
        Schema::dropIfExists('recrutements');
    }
}
