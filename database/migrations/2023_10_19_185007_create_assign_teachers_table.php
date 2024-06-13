<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assign_teachers', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('course_id')->unsigned();
            $table->bigInteger('session_id')->unsigned();
            $table->bigInteger('semester_id')->unsigned();
            $table->bigInteger('teacher_id')->unsigned();
            

            $table->string('section');

           

            $table->foreign('course_id')
            ->references('id')->on('courses')
            ->onDelete('cascade');

            $table->foreign('session_id')
            ->references('id')->on('sessions')
            ->onDelete('cascade');

            $table->foreign('teacher_id')
            ->references('id')->on('teachers')
            ->onDelete('cascade');

            $table->foreign('semester_id')
            ->references('id')->on('semesters')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_teachers');
    }
};
