<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AssignTeacherController;
use App\Http\Controllers\RoutineController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
//Student login & Register
Route::get('student-register',[AuthController::class,'sregister']);
Route::post('studentregister-store',[AuthController::class,'sregisterstore']);
Route::get('student-login',[AuthController::class,'slogin']);
Route::post('studentlogin-store',[AuthController::class,'sloginstore']);


//techer login & register

Route::get('teacher-register',[AuthController::class,'tregister']);
Route::post('teacherregister-store',[AuthController::class,'tregisterstore']);
Route::get('teacher-login',[AuthController::class,'tlogin']);
Route::post('teacherlogin-store',[AuthController::class,'tloginstore']);


//Stdeunt Dashboard

Route::middleware(['checkLoggedIn'])->group(function () {

Route::get('student-dashboard',[StudentController::class,'create']);

Route::get('enroll',[StudentController::class,'enroll']);

Route::post('enroll-store',[StudentController::class,'enroll_store']);

Route::get('enrolled-courses',[StudentController::class,'show_enroll']);

//Student Exam Routine
Route::get('exam-session-student',[RoutineController::class,'exam_sesion_student']);
Route::get('my-exam/{session}/{type}',[RoutineController::class,'my_exam']);

//Student Class Routine
Route::get('select-session',[RoutineController::class,'class_sesion_student']);
Route::get('my-class/{session}/{type}/{section}',[RoutineController::class,'myclass']);


Route::get('slogout', [AuthController::class, 'slogout']);



});

//Teacher Dashboard

Route::middleware(['isTeacher'])->group(function () {

    Route::get('admin-dashboard',[TeacherController::class,'dashboard']);
    Route::get('addcourse',[CourseController::class,'create']);
    Route::post('addcourse-store',[CourseController::class,'store']);
    Route::get('course-list',[CourseController::class,'list']);
    // Route::get('assign-teacher',[AssignTeacherController::class,'list']);

    //Editing Profile
    Route::get('edit-profile',[TeacherController::class,'edit_profile']);
    Route::put('edit-profile-store',[TeacherController::class,'profile_update']);

    

    //Edit & Update course
    Route::get('edit-course/{id}',[CourseController::class,'edit']);
    Route::post('update-course/{id}',[CourseController::class,'update']);
    Route::get('delete-course/{id}',[CourseController::class,'delete']);
    Route::get('teacher-dashboard',[TeacherController::class,'tdashboard']);

    //showing teacher his course
    Route::get('mycourses',[TeacherController::class,'mycourse']);
    Route::get('mystudent/{id}',[TeacherController::class,'mystudent']);


    //Assigning Teacher
    Route::get('assign-teacher/{id}',[AssignTeacherController::class,'assignteacher']);
    Route::post('assign-teacherstore',[AssignTeacherController::class,'assignteacher_store']);
    Route::get('show-assigned',[AssignTeacherController::class,'show']);

    //For teacher
    Route::get('tcourse-list',[CourseController::class,'clist']);

    //Admin
    Route::get('teacher-list',[TeacherController::class,'all']);
    Route::get('delete/{id}',[TeacherController::class,'delete']);

    //Routine

    Route::get('create-routine',[RoutineController::class,'create']);
    
    Route::post('get_course',[RoutineController::class,'get_course']);

    Route::post('get_teacher', [RoutineController::class,'get_teacher']);



    Route::post('routine-store',[RoutineController::class,'store']);
    Route::get('admin-routine-session',[RoutineController::class,'session_select']);

    Route::get('class-routine/{session}/{type}/{section}',[RoutineController::class,'viewRoutine']);

    //Showing Teacher Routine
    Route::get('routine-session',[RoutineController::class,'routinetsession']);
    Route::get('routine-show/{session}/{type}/{section}',[RoutineController::class,'show_routine']);
    

    //Exam Routine
    Route::get('create-exam-routine',[RoutineController::class,'exam_create']);
    Route::post('exam-routine-store',[RoutineController::class,'exam_store']);
    Route::get('exam-session',[RoutineController::class,'exam_sesion']);
    
    Route::get('exam-routine/{session}/{type}',[RoutineController::class,'exam_show']);


    Route::get('tlogout', [AuthController::class, 'tlogout']);
    });

    

    
   


