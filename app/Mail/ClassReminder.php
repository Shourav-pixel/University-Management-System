<?php

namespace App\Mail;

namespace App\Mail;

use App\Models\ClassRoutine;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClassReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $classRoutine;

    public function __construct(ClassRoutine $classRoutine)
    {
        $this->classRoutine = $classRoutine;
    }

    public function build()
    {
        return $this->view('emails.class-reminder')
                    ->subject('Class Reminder');
    }
}
