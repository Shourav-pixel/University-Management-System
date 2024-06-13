<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignTeacher;
use App\Models\Teacher;
use Student;
use DB;
use Session;


class TeacherController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }
    public function tdashboard()
    {

        return view('Teacher.pages.dashboard');
    }

    public function all()
    {
        // $teacher = DB::select('SELECT * FROM teachers WHERE role = "teacher"')
        // ->paginate(5);
                    
        $teacher = Teacher::where('role', 'teacher')->SimplePaginate(10);

        // $teacher = Teacher::where('role', '=', 'teacher');
       
        return view('admin.pages.teacher_list',compact('teacher'));
    }

    
    public function delete($id){
  
        //echo $id;
                    DB::table('teachers')
                    ->where('id', '=', $id)
                    ->delete();
        return redirect()->back()->with('dlt','Deleted succesfully');
       }

    public function edit_profile()
    {
        $teachers= DB:: table('teachers')
                    ->where('email',Session::get('email'))
                    ->first();
       session(['designation' => $teachers->designation]);
        return view('Teacher.pages.edit-profile',compact('teachers'));
    }

    public function profile_update(Request $r)
    {
        $name = $r->teacher_name;
        $teacher_id = $r->teacher_id;
        $acro_name = $r->acro_name;
        $email = $r->email;
        $phone_number= $r->number;
        $designation = $r->designation;

        $teachers = DB::table('teachers')
                    ->where('email',Session::get('email'))
                    ->update([
                        'name' => $name,
                        'teacher_id'=> $teacher_id,
                        'acro_name' => $acro_name,
                        'email' => $email,
                        'phone_number' => $phone_number,
                        'designation' => $designation,


                    ]);

                    return redirect()->back()->with('msg','Updated Successfully');
    

    }

    public function mycourse()
    {

       // dd(session()->all());
       $teacherId = session('userid');
        
       $assigned = DB::table('assign_teachers')
       ->join('courses', 'assign_teachers.course_id', '=', 'courses.id')
       ->join('teachers', 'assign_teachers.teacher_id', '=', 'teachers.id')
       ->join('semesters', 'assign_teachers.semester_id', '=', 'semesters.id')
       ->join('sessions', 'assign_teachers.session_id', '=', 'sessions.id')
       ->join('sections', 'assign_teachers.section_id', '=', 'sections.id')
       ->select('assign_teachers.*', 'courses.course_title', 'teachers.name', 'semesters.semester', 'sessions.session','sections.section')
       ->where('assign_teachers.teacher_id', $teacherId)
       ->get();

        return view('Teacher.pages.my-course',compact('assigned'));

    }

    public function mystudent($id)
    {
        $teacherId = session('userid');
        $course_id = $id;
        $result = DB::table('enrolls as e')
        ->select('e.student_id')
        ->distinct()
        ->join('assign_teachers as at', function ($join) use ($course_id) {
            $join->on('e.course_id', '=', 'at.course_id')
                 ->on('e.section_id', '=', 'at.section_id')
                 ->where('e.course_id', $course_id); // Add a where condition to filter by the course_id from the route
        })
        ->join('students as s', 'e.student_id', '=', 's.id')
        ->select('at.*','s.name','s.email','s.phone_number','s.student_id')
        
        
        ->get();


     

        //dd($result);

    return view('Teacher.pages.my-students', compact('result'));

  
        
        

        

    }


  
}
