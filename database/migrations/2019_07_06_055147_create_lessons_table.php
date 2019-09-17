<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->string('title');
            $table->integer('code');
            $table->integer('price');
            $table->integer('score');
            $table->longText('description');
            $table->increments('id');
            $table->boolean('showToUser')->default(false);
            $table->string('pic')->default('');
            $table->enum('courseLevel' , ['university','school','it','public']) ->default('public');
            $table->integer('groupId')->default(0) -> unsigned();
            $table->foreign('groupId')->references('id')->on('groups');
            $table->integer('tagId')->default(0) -> unsigned();
            $table->foreign('tagId')->references('id')->on('tags');

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
        Schema::dropIfExists('lessons');
    }
}
