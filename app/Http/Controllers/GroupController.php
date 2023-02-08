<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Courseinstructor;
use App\Models\Finalregistration;
use App\Models\Group;
use App\Models\Instructor;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $editions = Group::with('course','instructor')->orderBy('created_at','desc')->get();
        return view('admin.editions',compact('editions'));
    }
    public function create(){
        $courses = Course::orderBy('created_at','desc')->get();
        $instructors = Instructor::all();
        return view('admin.add-edition',compact('courses','instructors'));
    }

    public function store(Request $request){
        $edition = new Group();
        $edition->course_id = $request->course;
        $edition->instructor_id = $request->instructor;
        $edition->group = $request->name;
        $edition->nbr_session = $request->nbr_session;
        $edition->price_one = $request->price_one;
        $edition->price_two = $request->price_two;
        $edition->price_tree = $request->price_tree;
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
        $edition->nbr_session = $request->nbr_session;
        $edition->price_one = $request->price_one;
        $edition->price_two = $request->price_two;
        $edition->price_tree = $request->price_tree;
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

    public function studentList($id){
        $lists = Finalregistration::where('group_id',$id)->get();
        $group = Group::find($id);
        $course = Course::where('id',$group->course_id)->first();
        $total = $lists->count();
        $total_amount = Payment::where('group_id',$id)->sum('amount'); 
        $date = Carbon::now();
        return view('admin.student-list',compact('lists','course','group','total','total_amount','date'));
    }

    public function presenceList($id){
        $lists = Finalregistration::where('group_id',$id)->get();
        $group = Group::find($id);
        $course = Course::where('id',$group->course_id)->first();
        $total = $lists->count();
        return view('admin.presence-list',compact('lists','course','group','total'));
    }
    public function getSession($id){
        $group = Group::find($id);
        return $group->nbr_session;
    }
  
}
