<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use DB;
use Session;

class AuthController extends Controller
{
     //Student Register
    public function sregister()
    {
        return view('login.sregister');
    }
    public function sregisterstore(Request $request)
    {
        $username = $request->name;
        $userid = $request->id;
        $phone=$request->phone_number;
        $useremail= $request->email;
        $userpass = $request->password;
        $userconfpass = $request->confirm;
        
        if($userpass != $userconfpass){
            return redirect()->back()->with('err_msg','Password Mismatch');
        }
        else {
            DB::table('students')->insert([
                'name' => $username,
                'student_id' =>$userid,
                'phone_number'=>$phone,
                'email'=>$useremail,
                'password'=>md5($userpass),
                

            ]);
           
           return redirect()->back()->with('success','Successfully Registered');

        }
    }

    //Student login

    public function slogin()
    {
        return view('login.slogin');
    }

    public function sloginstore(Request $request)
    {
        $useremail = $request->email;
        $password =  $request->password;
        $user = DB::table('students')
            ->where('email','=',$useremail)
            ->where('password','=',md5($password))
            ->first();
          
             if(!$user)
            {
                return view('login.sregister');
            }
            else{//if all are ok


                
                Session::put('username',$user->name);
                Session::put('useremail',$user->email);
                Session::put('userid',$user->id);
                Session::put('phone',$user->phone_number);
                Session::put('userstudentid',$user->student_id);
                // $request->Session()->flush(['username','userrole']);
               
             return redirect('/student-dashboard');
                   // dd($user->email);

                   //$dashboardUrl = route('dashboard.show', ['id' => $user->id]);

        // Redirect to the dashboard
        //return redirect($dashboardUrl);
                
            }
    }




    //Teacher Login
    public function tlogin()
    {
        return view('login.tlogin');
    }
    public function tloginstore(Request $request)
    {
        $useremail = $request->email;
        $password =  $request->password;
        $user = DB::table('teachers')
            ->where('email','=',$useremail)
            ->where('password','=',md5($password))
            ->first();
        

           
           // if($user->is_approved == 'No'){
             //   return redirect()->back()->with('fail','User not Approved yet');
            //} 
             if(!$user)
            {
                return view('login.tregister');
            }
            else{//if all are ok
                Session::put('username',$user->name);
                Session::put('userid',$user->id);
                Session::put('userrole',$user->role);
                Session::put('phone',$user->phone_number);
                Session::put('teacherid',$user->teacher_id);
                Session::put('email',$user->email);
               
                // $request->session()->put('userid', $user->id);
                if($user->role == 'admin'){
                    $totalStudents = Student::count();
                    $teacher = Teacher::count();
                    $course = Course::count();
                    //dd($totalStudents);
                    return view('admin.pages.dashboard',compact('totalStudents','teacher','course'));
                }
               
                // $request->Session()->flush(['username','userrole']);
                else
                {
                    return redirect('/teacher-dashboard');
                }
           
               
                    
              
                
            }
    }



    //Techer register
    public function tregister()
    {
        return view('login.tregister');
    }
    // public function tregisterstore(Request $request)
    // {
    //     $username = $request->name;
    //     $userid = $request->id;
    //     $phone=$request->phone_number;
    //     $useremail= $request->email;
    //     $userpass = $request->password;
    //     $userconfpass = $request->confirm;
        
    //     if($userpass != $userconfpass){
    //         return redirect()->back()->with('err_msg','Password Mismatch');
    //     }
    //     else {
    //         DB::table('teachers')->insert([
    //             'name' => $username,
    //             'teacher_id' =>$userid,
    //             'phone_number'=>$phone,
    //             'email'=>$useremail,
    //             'password'=>md5($userpass),
                

    //         ]);
           
    //        return redirect()->back()->with('success','Successfully Registered');

    //     }
    // }
    public function tregisterstore(Request $request)
{
    $username = $request->name;
    $userid = $request->id;
    $phone = $request->phone_number;
    $useremail = $request->email;
    $userpass = $request->password;
    $userconfpass = $request->confirm;

    if ($userpass != $userconfpass) {
        return redirect()->back()->with('err_msg', 'Password Mismatch');
    } else {
        // Check if email already exists in the 'teachers' table
        $existingTeacher = DB::table('teachers')->where('email', $useremail)->first();

        if ($existingTeacher) {
            // If email already exists, show an error message
            return redirect()->back()->with('err_msg', 'Email already exists. Please use a different email.');
        } else {
            // If email is unique, insert the record into the database
            DB::table('teachers')->insert([
                'name' => $username,
                'teacher_id' => $userid,
                'phone_number' => $phone,
                'email' => $useremail,
                'password' => md5($userpass),
            ]);

            return redirect()->back()->with('success', 'Successfully Registered');
        }
    }
}


   
    public function tlogout(Request $request) {
        $request->session()->forget(['username', 'userid', 'userrole']);
        $request->session()->regenerate();
        return redirect('teacher-login');
    }
    
    public function slogout(Request $request) {
        $request->session()->forget(['username', 'userid']);
        $request->session()->regenerate();
        return redirect('student-login');
    }
    
    



}
