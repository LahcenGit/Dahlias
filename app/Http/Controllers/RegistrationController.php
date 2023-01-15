<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
         $registration->email = $request->email;
         $registration->filiere = $request->filiere;
         $registration->age = $request->age;
         $registration->remarque = $request->remarque;
         $registration->phone = $request->phone;
         //$registration->place_birth = $request->place_birth;
         $registration->status = 1;
         $registration->accept = $request->accept;
         $registration->save();

         $name = $request->name;
         $categories = Category::all();
         return view('register-success',compact('name','categories'));
    }

    public function register($id){
        $course = Course::find($id);
        $categories = Category::all();
        return view('register-course',compact('course','categories'));
    }


    public function registerSuccess($id,$name){
        $course = Course::find($id);
        $categories = Category::all();
        return view('register-course',compact('course','categories'));
    }

    public function modalRegistration(){
        $courses = Course::all();
        return view('admin.modal-registration',compact('courses'));
    }
    public function addRegistration(Request $request){

        $registration = new Registration();
        $registration->course_id = $request->course;
        $registration->name = $request->name;
        $registration->email = $request->email;
        $registration->age = $request->age;
        $registration->remarque = $request->remarque;
        $registration->phone = $request->telephone;
        $registration->status = 1;
        $registration->save();

        
        return $registration;
   }


  
}
