<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ClassRoutine;
use App\Models\Teacher;
use App\Models\Student; // Add the Student model
use Illuminate\Support\Facades\Mail;
use App\Mail\ClassReminder;
use Carbon\Carbon;

class SendClassReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:class-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email reminders to teachers and students 30 minutes before class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentTime = Carbon::now('Asia/Dhaka');

        // Calculate the target time 30 minutes before the class starts
        $targetTime = $currentTime->copy()->addMinutes(30);

        // Fetch classes where the start time is 30 minutes ahead of the current time
        $classes = ClassRoutine::whereTime('start_time', '=', $targetTime->format('H:i'))
            ->whereDate('start_time', '=', $targetTime->toDateString())
            ->get();

        foreach ($classes as $class) {
            // Fetch the teacher's email based on teacher_id from the class routine
            $teacherEmail = Teacher::where('id', $class->teacher_id)->value('email');

            // Fetch student emails based on the provided query
            $studentEmails = Student::select('students.email')
            ->join('enrolls', function ($join) use ($class) {
                $join->on('enrolls.course_id', '=', 'class_routines.course_id')
                    ->on('enrolls.session_id', '=', 'class_routines.session_id')
                    ->on('enrolls.section_id', '=', 'class_routines.section_id')
                    ->on('enrolls.student_id', '=', 'students.id');
            })
            ->join('class_routines', function ($join) use ($class) {
                $join->on('class_routines.course_id', '=', 'enrolls.course_id')
                    ->on('class_routines.session_id', '=', 'enrolls.session_id')
                    ->on('class_routines.section_id', '=', 'enrolls.section_id');
            })
            ->where('class_routines.course_id', '=', $class->course_id)
            ->where('class_routines.session_id', '=', $class->session_id)
            ->where('class_routines.section_id', '=', $class->section_id)
            ->get();



           // dd($studentEmails);
            // Send email to the teacher if the email is found
            if ($teacherEmail) {
                Mail::to($teacherEmail)->send(new ClassReminder($class));
                
            } else {
                $this->error('Teacher email not found for class ID: ' . $class->id);
            }

            // Send email to each student if their email is found

            //Mail::to('chyshourav2@gmail.com')->send(new ClassReminder($class));
             foreach ($studentEmails as $studentEmail) {
              //  Log::info('Sending email to student: ' . $studentEmail->email);
              Mail::to($studentEmail->email)->send(new ClassReminder($class));
            }
        }

        $this->info('Class reminders sent successfully!');
    }
}
