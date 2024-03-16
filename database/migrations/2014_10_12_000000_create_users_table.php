<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('app_id',100)->nullable();
            $table->string('first_name',25);
            $table->string('last_name',25);
            $table->string('email',50)->unique();
            $table->string('password',100);
            $table->rememberToken();
            $table->string('referral_code',100)->nullable();
            $table->string('referrer_code',100)->nullable();
            $table->string('mobile_no',15)->nullable();
            $table->enum('gender', ['Male','Female'])->nullable();
            $table->string('photo')->nullable();
            $table->enum('status', ['active','inactive'])->default('inactive');
            $table->enum('email_verify',['verified','unverified'])->default('unverified');
            $table->string('city')->nullable();
            $table->string('address')->nullable();
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
