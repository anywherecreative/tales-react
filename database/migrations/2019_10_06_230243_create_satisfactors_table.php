<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSatisfactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satisfactors', function (Blueprint $table) {
            $table->tinyInteger('vote');
            $table->integer('story_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('story_id')->references('id')->on('stories');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
            $table->primary(['story_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('satisfactors');
    }
}
