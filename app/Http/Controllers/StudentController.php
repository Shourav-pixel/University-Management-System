<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enroll;
use App\Models\Student;

use App\Models\Section;
//use Student;
use Session;
use DB;

class StudentController extends Controller
{
    public function create()
    {
        //$user = Student::find($id);
        return view('student.pages.dashboard');
        
    }

    public function slogout(Request $request)
    {
        $request->session()->forget(['username', 'userid', 'useremail']);
    }


    public function enroll()
    {
        $courses = Course::all();
        $sessions = DB:: table('sessions')->get();
        $sections = Section::all();
        $user=Session::all();

        return view('student.pages.enroll',compact('courses','sessions','sections','user'));
    }

// enroll_store
public function enroll_store(Request $request) {

   
//dd($request->all());
   


//kaj kortese
    $session = $request->input('session');
    $sections = $request->input('sections');
    $course_ids = $request->input('course_ids');

$student = Student::where('student_id', $request->input('student_id'))->first();

$student_id = $student->id;

// Loop through selected courses and sections and save them to the enrolls table
foreach ($sections as $key => $section) {
    if ($section) {
        $enroll = new Enroll();
        $enroll->student_id = $student_id;
        $enroll->course_id = $course_ids[$key];
        $enroll->section_id = $section;
        $enroll->session_id = $session;
        $enroll->save();
    }
}



return redirect()->back()->with('msg','Enrolled succesfully');
    }

//showing enrolled courses
    public function show_enroll()
    {
        $studentId = session('userid');
        
        $courses = DB::table('enrolls')
            ->join('courses', 'enrolls.course_id', '=', 'courses.id')
            ->join('sessions', 'enrolls.session_id', '=', 'sessions.id')
            ->join('sections', 'enrolls.section_id', '=', 'sections.id')
            ->select('enrolls.*', 'courses.course_title', 'sessions.session', 'sections.section')
            ->where('enrolls.student_id', $studentId)
            ->get();
        


        return view('student.pages.my_courses',compact('courses'));


    }
}
 


    


    



