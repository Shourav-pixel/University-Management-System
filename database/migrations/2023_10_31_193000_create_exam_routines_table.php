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
        Schema::create('exam_routines', function (Blueprint $table) {
            $table->id();
            
            // Foreign key to sessions table
            $table->unsignedBigInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions')->onDelete('cascade');

            $table->string('exam_type');

            $table->unsignedBigInteger('semester_id');
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');
            
            // Foreign key to courses table
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

         
            
            $table->time('start_time');
            $table->time('end_time');
            $table->date('date');
            $table->string('room');

            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_routines');
    }
};
