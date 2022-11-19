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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('content');
            $table->text('description');
            $table->text('description_details');
            $table->integer('price');
            $table->integer('discount');
            $table->integer('participant')->default(0);
            $table->integer('status')->default(0);
            $table->char('video');
            $table->text('image');
            $table->integer('language');
            $table->char('certificate');
            $table->char('tags');
            $table->integer('type')->default(0);
            $table->char('slug');
            $table->unsignedBigInteger('skill_id');
            $table->unsignedBigInteger('mentor_id');
            $table->unsignedBigInteger('cate_course_id');
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
        Schema::dropIfExists('courses');
    }
};
