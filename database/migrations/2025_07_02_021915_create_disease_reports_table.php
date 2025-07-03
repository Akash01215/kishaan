<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseaseReportsTable extends Migration
{
    public function up()
    {
        Schema::create('disease_reports', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('crop_name', 100);
            $table->string('disease_detected', 255)->nullable();
            $table->string('image_path', 255)->nullable();
            $table->dateTime('submitted_at')->nullable();

            $table->unsignedBigInteger('disease_id')->nullable();
            $table->foreign('disease_id')->references('id')->on('diseases')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('disease_reports');
    }
}
