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
            $table->char('status');
            $table->char('video');
            $table->text('image');
            $table->char('skill');
            $table->char('language');
            $table->char('certificate');
            $table->integer('type')->default(0);
            $table->char('slug');
            $table->integer('participant')->default(0);
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
