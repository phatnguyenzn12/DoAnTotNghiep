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
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar');
            $table->string('number_phone');
            $table->string('password');
            $table->text('about_me')->nullable();
            $table->string('address')->nullable();
            $table->string('social_networks')->nullable();
            $table->string('educations')->nullable();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('group_id');
            $table->string('skills')->nullable();
            $table->integer('years_in_experience')->nullable();
            $table->unsignedBigInteger('specialize_id');
            $table->integer('is_active')->default(0); //Không sửa thằng này
            $table->rememberToken();
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
        Schema::dropIfExists('mentors');
    }
};
