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
        Schema::create('comment_lessons', function (Blueprint $table) {
            $table->id();
            $table->text('comment');
            $table->integer('vote');
            $table->integer('reply');
            $table->char('status');
            $table->integer('user_id');
            // $table->integer('mentor_id');
            $table->integer('lesson_id');
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
        Schema::dropIfExists('commentLesson');
    }
};
