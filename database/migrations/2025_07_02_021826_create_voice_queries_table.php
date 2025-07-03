<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoiceQueriesTable extends Migration
{
    public function up()
    {
        Schema::create('voice_queries', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->text('query_text');
            $table->text('response_text')->nullable(); // should be text, not time

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('voice_queries');
    }
}
