<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function edit($id){
        $student = User::find($id);
        return view('admin.edit-student',compact('student'));
    }

    public function Update(Request $request , $id){
        $student = User::find($id);
        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->date_birth = $request->date_birth;
        $student->place_birth = $request->place_birth;
        $student->email = $request->email;
        $student->type = "student";
        $student->save();
        return redirect('dashboard-admin/students');
    }

    public function destroy($id){
        $student = User::find($id);
        $student->delete();
        return redirect('dashboard-admin/students');
    }
}
