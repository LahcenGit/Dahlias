<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Instructor;
use App\Models\Registration;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $courses = Course::count();
        $instructors = Instructor::count();
        $allRegistrations = Registration::count();
        $registrationsWaiting = Registration::where('status','1')->count();
        $registrations = Registration::limit('5')->orderBy('created_at','desc')->get();
        $registrationValid = Registration::where('status','2')->count();
        $registrationReimburse = Registration::where('status','3')->count();
        $registrationCancel = Registration::where('status','4')->count();
        return view('admin.dashboard-admin',compact('courses','instructors','registrations','registrationsWaiting','allRegistrations','registrationValid','registrationReimburse','registrationCancel'));
    }
}
