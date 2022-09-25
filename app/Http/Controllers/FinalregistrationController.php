<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Finalregistration;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class FinalregistrationController extends Controller
{
    //
    public function index(){
        $registrations = Finalregistration::all();
        return view('admin.final-registrations',compact('registrations'));
    }
    public function create(){
        $courses = Course::all();
        $students = User::where('type','student')->get();
        return view("admin.add-final-registration",compact('courses','students'));
    }

    public function store(Request $request){
        $registration = new Finalregistration();
        $registration->group_id = $request->edition;
        $registration->user_id = $request->student;
        $registration->course_id = $request->course;
        $registration->save();

        return redirect('dashboard-admin/final-registrations');
    }

    public function edit($id){
        $registration = Finalregistration::find($id);
        $courses = Course::all();
        $students = User::where('type','student')->get();
        $editions = Group::where('course_id',$registration->course_id)->get();
      
        return view('admin.edit-final-registration',compact('registration','courses','students','editions'));
    }

    public function update(Request $request , $id){
        $registration = Finalregistration::find($id);
        $registration->group_id = $request->edition;
        $registration->user_id = $request->student;
        $registration->course_id = $request->course;
        $registration->save();
        return redirect('dashboard-admin/final-registrations');
    }

    public function destroy($id){
        $registration = Finalregistration::find($id);
        $registration->delete();
        return redirect('dashboard-admin/final-registrations');
    }
    
    public function addFinalRegistration($id){
        $course = Course::find($id);
        $editions = Group::where('course_id',$id)->get();
        $students = User::where('type',"student")->get();
        
        return view('admin.modal-final-registration',compact('course','editions','students'));
    }

    public function storeFinlRegistration(Request $request){
        $registration = new Finalregistration();
        $registration->group_id = $request->edition;
        $registration->user_id = $request->student;
        $course = Group::find($request->edition);
        $registration->course_id = $course->course_id;
        $registration->save();
    }

    public function getEdition($id){
        $editions = Group::where('course_id',$id)->get();
        return $editions;
    }
}
