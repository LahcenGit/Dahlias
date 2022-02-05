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
         $registration->remarque = $request->remarque;
         $registration->phone = $request->phone;
         $registration->status = 1;
         $registration->save();

         $name = $request->name;
         return view('register-success',compact('name'));
    }

    public function register($id){
        $course = Course::find($id);
        return view('register-course',compact('course'));
    }


    public function registerSuccess($id,$name){
        $course = Course::find($id);
        return view('register-course',compact('course'));
    }


  
}
