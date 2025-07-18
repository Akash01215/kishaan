<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFertilizerSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fertilizer_suggestions', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id')->nullable();
        $table->string('crop_name');
        $table->float('nitrogen');
        $table->float('phosphorus');
        $table->float('potassium');
        $table->text('deficiency')->nullable(); // later from ML/API
        $table->text('suggested_action')->nullable(); // later from ML/API
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
        Schema::dropIfExists('fertilizer_suggestions');
    }
}
