<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crop_recommendations', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id')->nullable();
        $table->float('nitrogen');
        $table->float('phosphorus');
        $table->float('potassium');
        $table->string('city');
        $table->string('state');
        $table->string('recommended_crop')->nullable();
        $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crop_recommendations');
    }
}
