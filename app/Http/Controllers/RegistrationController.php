<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //
    public function index(){
        return view('home');
    }
    public function store(Request $request){

         $registration = new Registration();
         $registration->course_id = $request->course;
         $registration->name = $request->name;
         $registration->age = $request->age;
         $registration->phone = $request->phone;
         $registration->save();
         return redirect('registration-course');
    }

    public function register($id){
        $course = Course::find($id);
        return view('register-course',compact('course'));
    }
}