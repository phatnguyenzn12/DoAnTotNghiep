<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('lesson_type')->default('video');
            //$table->string('attachment')->nullable();
            $table->string('download_progress')->nullable();
            //$table->tinyInteger('sort');
            $table->time('time')->nullable();
            $table->integer('is_demo')->default(0);
            $table->integer('is_check')->default(0);
          //  $table->integer('is_block')->default(0);
            $table->unsignedBigInteger('chapter_id');
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
};
