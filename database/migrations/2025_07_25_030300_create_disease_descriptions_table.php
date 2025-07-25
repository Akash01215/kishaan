<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseaseDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
    Schema::create('disease_descriptions', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('label')->unique(); // e.g. 'Mild Brownspot' or 'Tomato_Late_blight'
        $table->string('title')->nullable(); // Human readable title
        $table->text('description')->nullable(); // Disease description
        $table->text('treatment')->nullable(); // Suggested treatment
        $table->float('confidence')->nullable(); // Confidence score (e.g., 0.97)
        $table->string('image_path')->nullable(); // Store image file path
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
        Schema::dropIfExists('disease_descriptions');
    }
}
