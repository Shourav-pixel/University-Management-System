<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class dummyApi extends Controller
{
    function getData($id=null)
    {
        return $id?Student::find($id):Student::all();
    }
}
