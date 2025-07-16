<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
   public function up()
   {
       Schema::create('users', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('name', 100);
           $table->string('email', 100)->unique();
           $table->string('password', 255);
           $table->enum('role', ['admin', 'user'])->default('user'); // Define user roles
           $table->timestamps(); // created_at, updated_at
           $table->rememberToken(); // optional, for authentication
       });
   }

   public function down()
   {
       Schema::dropIfExists('users');
   }
}
