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
        Schema::create('class_routines', function (Blueprint $table) {
            $table->id();
           
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('day_id');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('section_id');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('room_number');
            
            $table->timestamps();

            // Define foreign keys
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('day_id')->references('id')->on('weeks');
            $table->foreign('session_id')->references('id')->on('sessions');
            $table->foreign('section_id')->references('id')->on('sections');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_routines');
    }
};
