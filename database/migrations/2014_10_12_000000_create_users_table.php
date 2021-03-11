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
            $table->unsignedInteger('role_id')->default('3');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('avatar')->nullable();
            $table->string('adress')->nullable();
            $table->string('postcode')->nullable();
            $table->string('district')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            //$table->foreign('role_id')->references('id')->on('roles');
            //ALTER TABLE `users` ADD CONSTRAINT `ro` FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
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
