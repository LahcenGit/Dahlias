<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Finalregistration;
use App\Models\Group;
use App\Models\Instructor;
use App\Models\Load;
use App\Models\Payment;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $total_payment = Payment::sum('amount');
        $total_load = Load::sum('amount');
        $total_user = User::where('type','student')->count();
        $courses = Course::all();
        $rest = 0;
        foreach($courses as $course){
            $nbr_registration = Finalregistration::where('course_id',$course->id)->count();
            $sum_payment = Payment::where('course_id',$course->id)->sum('amount');
            $rest = $rest + ($course->price*$nbr_registration)-$sum_payment;
        }
        $registrations = Registration::limit('5')->get()->reverse();
        $final_registrations = Finalregistration::limit('5')->get()->reverse();
        return view('admin.dashboard-admin',compact('total_payment','total_load','total_user','rest','registrations','final_registrations'));
    }
}
