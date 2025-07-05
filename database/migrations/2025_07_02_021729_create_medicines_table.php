<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('disease_name', 255)->nullable();
            $table->string('medicine_name', 255);
            $table->string('dosage', 100)->nullable();
            $table->text('instructions')->nullable();

            $table->unsignedBigInteger('disease_id');
            $table->foreign('disease_id')->references('id')->on('diseases')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}
