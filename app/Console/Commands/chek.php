<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ClassRoutine;
use App\Models\Teacher;
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
    protected $description = 'Send email reminders to teachers 30 minutes before class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentTime = Carbon::now('Asia/Dhaka');

        // Calculate the target time 30 minutes before the class starts

        
        $targetTime = $currentTime->copy()->addMinutes(30);
        //dd($targetTime);

        // Fetch classes where the start time is 30 minutes ahead of the current time
        $classes = ClassRoutine::whereTime('start_time', '=', $targetTime->format('H:i'))
            ->whereDate('start_time', '=', $targetTime->toDateString())
            ->get();
        //dd($classes);

        foreach ($classes as $class) {
            // Fetch the teacher's email based on teacher_id from the class routine
            $teacherEmail = Teacher::where('id', $class->teacher_id)->value('email');
           
            
       

            if ($teacherEmail) {
                // Send email to the teacher if the email is found
                Mail::to($teacherEmail)->send(new ClassReminder($class));
            } else {
                // Handle the case if teacher email is not found for some reason
                $this->error('Teacher email not found for class ID: ' . $class->id);
            }

        }

        $this->info('Class reminders sent successfully!');
      }
    }

