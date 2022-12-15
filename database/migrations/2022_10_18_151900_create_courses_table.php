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
            $table->integer('price')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('participant')->default(0);
            $table->integer('status')->default(0);
            $table->text('video');
            $table->text('image');
            $table->integer('percentage_pay')->nullable();
            $table->integer('language');
            $table->integer('type')->default(0);
            $table->char('slug');
            $table->unsignedBigInteger('skill_id');
            $table->unsignedBigInteger('mentor_id')->nullable();
            $table->unsignedBigInteger('cate_course_id');
            $table->unsignedBigInteger('certificate_id');
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
