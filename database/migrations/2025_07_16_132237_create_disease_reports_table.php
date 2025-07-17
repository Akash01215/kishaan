<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseaseReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_reports', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id')->nullable();
        $table->string('crop_name');
        $table->string('disease_detected')->nullable();  // Will be filled later
        $table->string('image_path')->nullable();        // Leaf image
        $table->text('cure_suggestion')->nullable();     // Cure text from ML
        $table->timestamp('submitted_at')->nullable();
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
        Schema::dropIfExists('disease_reports');
    }
}
