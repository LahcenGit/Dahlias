<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Finalregistration;
use App\Models\Group;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
class PaymentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $payments = Payment::with('group','user')->get();
        return view('admin.payments',compact('payments'));
    }
    public function create(){
        $courses = Course::all();
        $students = User::where('type','student')->get();
        return view('admin.add-payment',compact('students','courses'));
    }

    public function store(Request $request){
        $payment = new Payment();
        $payment->user_id = $request->student;
        $payment->group_id = $request->edition;
        $payment->amount = $request->amount;
        $payment->n_bon = $request->n_bon;
        $payment->course_id = $request->course;
        $payment->save();
        return redirect('dashboard-admin/payments');
    }

    public function edit($id){
        $payment = Payment::find($id);
        $courses = Course::all();
        $edition = Group::where('id',$payment->group_id)->first();
        $course = Course::where('id',$edition->course_id)->first();
        $editions = Group::where('course_id',$course->id)->get();
        $students = Finalregistration::where('group_id',$edition->id)->with('user')->get();
        return view('admin.edit-payment',compact('payment','courses','editions','students','course'));
    }

    public function update(Request $request , $id){
        $payment = Payment::find($id);
        $payment->user_id = $request->student;
        $payment->group_id = $request->edition;
        $payment->amount = $request->amount;
        $payment->n_bon = $request->n_bon;
        $payment->course_id = $request->course;
        $payment->save();
        return redirect('dashboard-admin/payments');
    }

    public function destroy($id){
        $payment = Payment::find($id);
        $payment->delete();
        return redirect('dashboard-admin/payments'); 
    }

    public function getRest($course_id , $edition_id , $student_id , $amount){
        $course = Course::find($course_id);
        $total_payment = Payment::where('course_id',$course_id)->where('group_id',$edition_id)->where('user_id',$student_id)->sum('amount');
        $rest = $course->price - ($total_payment + $amount);
        return $rest;
    }

   public function reportView(){
    $students = User::where('type','student')->get();
     return view('admin.report-view',compact('students'));
   }

   public function getCourseGroup($id){

    $finalregistrations = Finalregistration::with('course')->with('group')->where('user_id',$id)->get();
    return $finalregistrations;
   }

    public function getStudent($id){
        $students = Finalregistration::with('user')->where('group_id',$id)->get();
        return $students;
    }

    public function generateReport($group_id , $user_id){
        $payments = Payment::where('user_id',$user_id)->where('group_id',$group_id)->get();
        $group = Group::find($group_id);
        $user = User::find($user_id);
        $course = Course::find($group->course_id);
        $total = Payment::where('user_id',$user_id)->where('group_id',$group_id)->sum('amount');
        $rest = $course->price - $total;
        $date =  Carbon::now();
        return view('admin.report-student-payment',compact('payments','group','total','user','date','rest'));
    }
}
