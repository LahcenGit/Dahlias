<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Courseinstructor;
use App\Models\Group;
use App\Models\Instructor;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    //
    public function index(){
        $editions = Group::with('course','instructor')->get();
        return view('admin.editions',compact('editions'));
    }
    public function create(){
        $courses = Course::all();
        $instructors = Instructor::all();
        return view('admin.add-edition',compact('courses','instructors'));
    }

    public function store(Request $request){
        $edition = new Group();
        $edition->course_id = $request->course;
        $edition->instructor_id = $request->instructor;
        $edition->group = $request->name;
        $edition->save();
        return redirect('dashboard-admin/editions');
    }

    public function edit($id){
        $edition = Group::find($id);
        $courses = Course::all();
        $course = Course::where('id',$edition->course_id)->first();
        $instructors = Courseinstructor::where('course_id',$course->id)->with('instructor')->get();
        
        return view('admin.edit-edition',compact('edition','courses','instructors'));
    }

    public function update(Request $request , $id){
        $edition = Group::find($id);
        $edition->course_id = $request->course;
        $edition->instructor_id = $request->instructor;
        $edition->group = $request->name;
        $edition->save();
        return redirect('dashboard-admin/editions');
    }
    public function destroy($id){
        $edition = Group::find($id);
        $edition->delete();
        return redirect('dashboard-admin/editions');
    }

    public function getInstructor($id){
      $instructor = Courseinstructor::where('course_id',$id)->with('instructor')->get();
      return $instructor;
    }
  
}
