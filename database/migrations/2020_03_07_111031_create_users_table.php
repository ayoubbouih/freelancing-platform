<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username',50);
            $table->string('email',50)->unique();
            $table->string('tele',50);
            $table->string('image',255)->nullable();
            $table->string('password');
            $table->string('description',255);
            $table->unsignedDecimal('solde',8,2);
            $table->string('paypal',50);
            $table->unsignedBigInteger('id_role');
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
        Schema::dropIfExists('users');
    }
}
