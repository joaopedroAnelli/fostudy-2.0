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
            $table->bigIncrements('id');
            $table->timestamp('created_at');
            $table->timestamp('starts_at');
            $table->timestamp('finished_at');
            $table->string('notes');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('discipline_id');

            $table->foreign('teacher_id')->references('id')->on('users');
            $table->foreign('discipline_id')->references('id')->on('disciplines');

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
