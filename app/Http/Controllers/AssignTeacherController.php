<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\Semester;
use App\Models\Session;
use App\Models\AssignTeacher;
use App\Models\Section;

use DB;

class AssignTeacherController extends Controller
{
    public function assignteacher($id)
   {
   $teacher= DB:: table('teachers')
      ->where('role', '=','teacher')
      ->get();
    $semester = Semester::all();
    $session = Session::all();
    $section = Section::all();
    $courses = DB:: table('courses')
    ->where('id', '=',$id)
    ->first();
    return view('admin.pages.assign_teacher',compact('semester','teacher','session','courses','section'));
   }

   public function assignteacher_store(Request $r)
   {
      $obj = new AssignTeacher();
      $obj->course_id = $r->course_id;
      $obj->session_id = $r->session_id;
      $obj->semester_id = $r->semester_id;
      $obj->teacher_id = $r->tid;
      $obj->section_id = $r->section;
      $obj->save();

      Course::where('id', $r->course_id)->update(['status' => 1]);


      // dd($obj);

      return redirect()->back()->with('msg','Updated succesfully');
    

   }

   public function show()
   {
       $assigned = DB::table('assign_teachers')
           ->join('courses', 'assign_teachers.course_id', '=', 'courses.id')
           ->join('teachers', 'assign_teachers.teacher_id', '=', 'teachers.id')
           ->join('semesters', 'assign_teachers.semester_id', '=', 'semesters.id')
           ->join('sessions', 'assign_teachers.session_id', '=', 'sessions.id')
           ->join('sections', 'assign_teachers.section_id', '=', 'sections.id')
           ->select('assign_teachers.*', 'courses.course_title', 'teachers.name', 'semesters.semester', 'sessions.session','sections.section')
           ->get();
   
       return view('admin.pages.show_assigned_teacher', compact('assigned'));
   }
   

   }

