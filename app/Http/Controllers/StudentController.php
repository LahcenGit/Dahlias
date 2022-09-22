<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index(){
        $students = User::where('type','student')->get();
        return view('admin.students',compact('students'));
    }
    public function create(){
        return view('admin.add-student');
    }
    public function store(Request $request){
        $student = new User();
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->date_birth = $request->date_birth;
        $student->place_birth = $request->place_birth;
        $student->email = $request->email;
        $student->type = "student";
        $student->save();
        return redirect('dashboard-admin/students');

    }
}
