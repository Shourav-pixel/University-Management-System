<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Week;
use App\Models\Semester;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Session;
use App\Models\ClassRoutine;
use App\Models\ExamRoutine;
use App\Models\Section;
use App\Models\ExamType;
use DB;


class RoutineController extends Controller
{
    public function create()
    {
        $day = Week::all();
        $semester = Semester::all();
        $session =  Session::all();
        $section = Section::all();
        return view('admin.pages.Routine.ClassRoutine.create',compact('day','semester','session','section'));
    }
//for getting course on ajax
    public function get_course(Request $r)
    {
        $semester_id = $r->semester_id;
        $course = DB::table('courses')
            ->where('semester_id', $semester_id)
            ->get();
    
        $html = "<option value=''>Select Course</option>";
    
        foreach ($course as $c) {
            $html .= "<option value='" . $c->id . "'>" . $c->course_title . "</option>";
        }
    
        $json['html'] = $html;
        echo json_encode($json);
    }
//For getting teacher on ajax
    public function get_teacher(Request $request)
    {
        $course_id = $request->course_id;
        $session = $request->session;
    
        // Find the assigned teacher from the 'assign_teachers' table
        $assignment = DB::table('assign_teachers')
            ->where('course_id', $course_id)
            ->get();

        $teacherName=[]; 
        if ($assignment) {
            foreach ($assignment as $assign) {
                $teacherName[] = Teacher::find($assign->teacher_id)->name;
            }
        } else {
            $teacherName[] = 'No Assigned Teacher';
        }

        // $teacherName[] = $assignment ? Teacher::find($assignment->teacher_id)->name : 'No Assigned Teacher';
    
        return response()->json(['teacherName' => $teacherName]);
    }





public function store(Request $r) {
    // dd($r->all());
    $name = $r->teacher;

    $teacher = DB::table('teachers')
        ->where('name', $name)
        ->first();

    if ($teacher) {
        $teacher_id = $teacher->id;

        foreach ($r->day as $day) {
            if (!empty($day['week_id']) && !empty($day['start_time']) && !empty($day['end_time']) && !empty($day['room'])) {
                $save = new ClassRoutine();
                $save->session_id = $r->session;
                $save->semester_id = $r->semester;
                $save->course_id = $r->course;
                $save->teacher_id = $teacher_id;
                $save->section_id = $r->section;
               
                $save->day_id = $day['week_id'];
                $save->start_time = $day['start_time'];
                $save->end_time = $day['end_time'];
                $save->room = $day['room'];
                $save->save();
            }
        }

        return redirect()->back()->with('msg', 'Routine created successfully');
    } 
}
//For ClassRoutine Session and Semester Selection
public function session_select()
{
    $type = Semester::all();
    $session = Session::all();
    $section = Section::all();
    return view('admin.pages.Routine.ClassRoutine.routineSession',compact('type','session','section'));

}

public function viewRoutine($session,$semester,$section)
{

    
// Fetch data from the database based on the provided parameters
$classRoutines = ClassRoutine::select(
    'class_routines.day_id',
    'class_routines.start_time',
    'class_routines.end_time',
    'courses.course_title',
    'courses.course_code',
    'teachers.name',
    'courses.course_type',
    'class_routines.room'
)
    ->join('weeks', 'class_routines.day_id', '=', 'weeks.id')
    ->join('semesters', 'class_routines.semester_id', '=', 'semesters.id')
    ->join('courses', 'class_routines.course_id', '=', 'courses.id')
    ->join('teachers', 'class_routines.teacher_id', '=', 'teachers.id')
    ->join('sessions', 'class_routines.session_id', '=', 'sessions.id')
    ->join('sections', 'class_routines.section_id', '=', 'sections.id')
    ->where('sessions.id', $session)
    ->where('semesters.id', $semester)
    ->where('sections.id', $section)
    ->get();

// Get the unique day_ids from class_routines
$uniqueDayIds = $classRoutines->pluck('day_id')->unique();

// Get the corresponding days from the weeks table
$daysOfWeek = Week::whereIn('id', $uniqueDayIds)->get();

// Organize the data day-wise
$organizedData = [];
foreach ($classRoutines as $routine) {
    $day = $daysOfWeek->where('id', $routine->day_id)->first();
    //$dayName = $day ? $day->day_name : 'Unknown Day';

    $organizedData[$routine->day_id]['day_name'] = $day->day;
    $organizedData[$routine->day_id]['routines'][] = [
        'start_time' => $routine->start_time,
        'end_time' => $routine->end_time,
        'course_title' => $routine->course_title,
        'course_code' => $routine->course_code,
        'teacher_name' => $routine->name,
        'course_type' => $routine->course_type,
        'room' => $routine->room,
    ];
}

     //dd($organizedData);


    return view('admin.pages.Routine.ClassRoutine.show_class_routine', ['week' => $organizedData]);
}
//For student Class routine
public function class_sesion_student()
{
    $type = Semester::all();
    $session = Session::all();
    $section = Section::all();
    return view('student.pages.MyRoutines.Class.selectSession',compact('type','session','section'));
}

public function myclass($session,$semester,$section)
{
   // Fetch data from the database based on the provided parameters
$classRoutines = ClassRoutine::select(
    'class_routines.day_id',
    'class_routines.start_time',
    'class_routines.end_time',
    'courses.course_title',
    'courses.course_code',
    'teachers.name',
    'courses.course_type',
    'class_routines.room'
)
    ->join('weeks', 'class_routines.day_id', '=', 'weeks.id')
    ->join('semesters', 'class_routines.semester_id', '=', 'semesters.id')
    ->join('courses', 'class_routines.course_id', '=', 'courses.id')
    ->join('teachers', 'class_routines.teacher_id', '=', 'teachers.id')
    ->join('sessions', 'class_routines.session_id', '=', 'sessions.id')
    ->join('sections', 'class_routines.section_id', '=', 'sections.id')
    ->where('sessions.id', $session)
    ->where('semesters.id', $semester)
    ->where('sections.id', $section)
    ->get();

// Get the unique day_ids from class_routines
$uniqueDayIds = $classRoutines->pluck('day_id')->unique();

// Get the corresponding days from the weeks table
$daysOfWeek = Week::whereIn('id', $uniqueDayIds)->get();

// Organize the data day-wise
$organizedData = [];
foreach ($classRoutines as $routine) {
    $day = $daysOfWeek->where('id', $routine->day_id)->first();
    //$dayName = $day ? $day->day_name : 'Unknown Day';

    $organizedData[$routine->day_id]['day_name'] = $day->day;
    $organizedData[$routine->day_id]['routines'][] = [
        'start_time' => $routine->start_time,
        'end_time' => $routine->end_time,
        'course_title' => $routine->course_title,
        'course_code' => $routine->course_code,
        'teacher_name' => $routine->name,
        'course_type' => $routine->course_type,
        'room' => $routine->room,
    ];
}

     //dd($organizedData);


    return view('student.pages.MyRoutines.Class.myClass', ['week' => $organizedData]); 
}

//For Teacher
public function routinetsession()
{
    $type = Semester::all();
    $session = Session::all();
    $section = Section::all();
    return view('Teacher.pages.Class.selectSession',compact('type','session','section'));
}

public function show_routine($session,$semester,$section)
{
      // Fetch data from the database based on the provided parameters
$classRoutines = ClassRoutine::select(
    'class_routines.day_id',
    'class_routines.start_time',
    'class_routines.end_time',
    'courses.course_title',
    'courses.course_code',
    'teachers.name',
    'courses.course_type',
    'class_routines.room'
)
    ->join('weeks', 'class_routines.day_id', '=', 'weeks.id')
    ->join('semesters', 'class_routines.semester_id', '=', 'semesters.id')
    ->join('courses', 'class_routines.course_id', '=', 'courses.id')
    ->join('teachers', 'class_routines.teacher_id', '=', 'teachers.id')
    ->join('sessions', 'class_routines.session_id', '=', 'sessions.id')
    ->join('sections', 'class_routines.section_id', '=', 'sections.id')
    ->where('sessions.id', $session)
    ->where('semesters.id', $semester)
    ->where('sections.id', $section)
    ->get();

// Get the unique day_ids from class_routines
$uniqueDayIds = $classRoutines->pluck('day_id')->unique();

// Get the corresponding days from the weeks table
$daysOfWeek = Week::whereIn('id', $uniqueDayIds)->get();

// Organize the data day-wise
$organizedData = [];
foreach ($classRoutines as $routine) {
    $day = $daysOfWeek->where('id', $routine->day_id)->first();
    //$dayName = $day ? $day->day_name : 'Unknown Day';

    $organizedData[$routine->day_id]['day_name'] = $day->day;
    $organizedData[$routine->day_id]['routines'][] = [
        'start_time' => $routine->start_time,
        'end_time' => $routine->end_time,
        'course_title' => $routine->course_title,
        'course_code' => $routine->course_code,
        'teacher_name' => $routine->name,
        'course_type' => $routine->course_type,
        'room' => $routine->room,
    ];
}

return view('Teacher.pages.Class.myClass',['week' => $organizedData]);

}
//Exam Routine 
public function exam_create()
{
    $course = Course::all();
    $session = Session::all();
    $semester = Semester::all();
    $type = ExamType::all();

    return view('admin.pages.Routine.ExamRoutine.create',compact('course','session','semester','type'));
}


public function exam_store(Request $r)
{
    $obj = new ExamRoutine();
    $obj->session_id = $r->session;
    $obj->exam_id = $r->exam_type;
    $obj->semester_id = $r->semester;
    $obj->course_id = $r->course;
    $obj->start_time = $r->start_time;
    $obj->end_time = $r->end_time;
    $obj->date = $r->date;
    $obj->room = $r->room;
    $obj -> save();


    return redirect()->back()->with('msg', 'Routine created successfully');
}

public function exam_sesion()
{
    $type = ExamType::all();
    $session = Session::all();
    return view('admin.pages.Routine.ExamRoutine.exam_session',compact('type','session'));
}


public function exam_show($session,$type)
{
    $exam = DB::table('exam_routines')
    ->join('courses', 'exam_routines.course_id', '=', 'courses.id')
    ->join('sessions', 'exam_routines.session_id', '=', 'sessions.id')
    ->join('semesters', 'exam_routines.semester_id', '=', 'semesters.id')
    ->select('exam_routines.*', 'courses.course_title', 'courses.course_code', 'courses.course_credit', 'courses.course_type','semesters.semester')
    ->where('exam_routines.session_id', $session) // Filter by session_id
    ->where('exam_routines.exam_id', $type) // Filter by exam type
    ->get();

    return view('admin.pages.Routine.ExamRoutine.show_exam',compact('exam'));
}

//Student r View 

//Session & Exam Type Selection
Public function exam_sesion_student()
{
    $type = ExamType::all();
    $session = Session::all();
    return view('student.pages.MyRoutines.Exam.examsession',compact('type','session'));
}

//Showing Enrolled courses,sesssion wise and Exam type wise
public function my_exam($session,$type)
{
    $studentId = session('userid');

    
$exam = DB::table('exam_routines')
    ->join('courses', 'exam_routines.course_id', '=', 'courses.id')
    ->join('sessions', 'exam_routines.session_id', '=', 'sessions.id')
    ->join('semesters', 'exam_routines.semester_id', '=', 'semesters.id')
    ->join('enrolls', function ($join) use ($studentId, $session) {
        $join->on('courses.id', '=', 'enrolls.course_id')
             ->on('exam_routines.session_id', '=', 'enrolls.session_id')
             ->where('enrolls.student_id', '=', $studentId);
    })
    ->select('exam_routines.*', 'courses.course_title', 'courses.course_code', 'courses.course_credit', 'courses.course_type', 'semesters.semester')
    ->where('exam_routines.exam_id', $type) // Filter by exam type
    ->get();



    return view('student.pages.MyRoutines.Exam.examroutine',compact('exam'));
}

    
}
