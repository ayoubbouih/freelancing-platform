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
            $table->string('username',50)->unique();
            $table->string('email',60)->unique();
            $table->string('fullname',50);
            $table->string('tel',20)->nullable();
            $table->string('image',255)->nullable();
            $table->string('password');
            $table->string('remember_token',100)->default("");
            $table->string('description',255)->nullable();
            $table->unsignedDecimal('solde',8,2)->default(0);
            $table->string('paypal',60);
            $table->unsignedBigInteger('role_id');
            $table->string('pays',30)->default("maroc");;
            $table->string('last_activity',11)->default(0);
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
