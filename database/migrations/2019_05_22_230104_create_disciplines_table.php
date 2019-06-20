<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     * Shopify. O QUE É DROPPING SHIPPING NACIONAL? O dro
     * @return void Shopify. O QUE É DROPPING SHIPPING NACIONAL? O dro
     */
    public function up()
    {
        Schema::create('disciplines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('season');
            $table->unsignedBigInteger('course_id');

            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplines');
    }
}
