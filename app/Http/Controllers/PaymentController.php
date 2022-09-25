<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Finalregistration;
use App\Models\Group;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index(){
        $payments = Payment::with('group','student')->get();
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
        $payment->save();
        return redirect('dashboard-admin/payments');
    }

    public function edit($id){
        $payment = Payment::find($id);
        $courses = Course::all();
        $edition = Group::where('id',$payment->group_id)->first();
        $course = Course::where('id',$edition->course_id)->first();
        $editions = Group::where('course_id',$course->id)->get();
        $students = Finalregistration::where('group_id',$edition->id)->with('student')->get();
        return view('admin.edit-payment',compact('payment','courses','editions','students','course'));
    }

    public function update(Request $request , $id){
        $payment = Payment::find($id);
        $payment->user_id = $request->student;
        $payment->group_id = $request->edition;
        $payment->amount = $request->amount;
        $payment->n_bon = $request->n_bon;
        $payment->save();
        return redirect('dashboard-admin/payments');
    }

    public function destroy($id){
        $payment = Payment::find($id);
        $payment->delete();
        return redirect('dashboard-admin/payments'); 
    }

    public function getPrice($id){
        $course = Course::find($id);
        return $course;
    }

   

    public function getStudent($id){
        $students = Finalregistration::with('student')->where('group_id',$id)->get();
        return $students;
    }
}
