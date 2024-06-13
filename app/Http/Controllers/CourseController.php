<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;
use DB;
use Session;

class CourseController extends Controller
{
    public function create()
    {
        $semester = DB::table('semesters')->get();
        return view('admin.pages.addcourse',compact('semester'));
    }
    public function store(Request $r)
    {

        $obj = new Course();
        $obj->course_title = $r->course_title;
        $obj->course_code = $r->course_code;
        $obj->course_acroname = $r->acro_name;

        $obj->course_credit = $r->course_credit;
        $obj->course_type = $r->course_type;
        $obj->semester_id = $r->semester;
        $obj->save();
        // dd($obj);
        

        return redirect('course-list');
    }

    public function list()
    {
      

        $courses = Course::SimplePaginate(10);
      
       
       return view('admin.pages.courselist',compact('courses'));
        
    }

    public function clist()
    {
        $courses = Course::paginate(10);
      
       
        return view('Teacher.pages.tcourselist',compact('courses'));
    }

    public function edit($id)
    {
        $courses= DB:: table('courses')
                    ->where('id', '=',$id)
                    ->first();
       
        return view('admin.pages.edit_course',compact('courses'));
        
    }

    
    public function update(Request $r,$id)
    {
        $course_title = $r->course_title;
        $course_code = $r->course_code;
        $course_credit = $r->course_credit;
        $course_type = $r->course_type;
        $semester = $r->semester;
    
        $courses = DB::table('courses')
              ->where('id', $id)
              ->update([ 
              'course_title' => $course_title,
              'course_code'=>$course_code,
              'course_credit'=>$course_credit,
              'course_type'=>$course_type,
              'semester_id'=>$semester,
    
    
                        ]);
                        
            return redirect()->back()->with('msg','Updated succesfully');
    }



    public function delete($id){
  
        //echo $id;
                    DB::table('courses')
                    ->where('id', '=', $id)
                    ->delete();
        return redirect()->back()->with('dlt','Deleted succesfully');
       }

}
