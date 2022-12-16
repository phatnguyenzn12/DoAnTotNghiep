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
            $table->integer('reply')->default(0);
            $table->integer('status')->default(1);
            $table->string('tags')->nullable();
            $table->string('image')->default(null);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->unsignedBigInteger('mentor_id')->default(0);
            $table->unsignedBigInteger('lesson_id');
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
