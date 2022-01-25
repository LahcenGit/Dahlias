<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    //
    public function create(){
        return view('admin.add-instructor');
    }

    public function index(){
        $instructors = Instructor::all();
        return view('admin.instructors',compact('instructors'));
    }
    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'string', 'max:255'],
            'function' => ['required', 'string', 'max:255']
   
           ]);

        $instrucor = new Instructor();
        $instrucor->name = $request->name;
        $instrucor->email = $request->email;
        $instrucor->phone = $request->phone;
        $instrucor->function = $request->function;
        $instrucor->date_of_birth = $request->date_of_birth;
        $instrucor->save();

        return redirect('dashboard-admin/instructors');
        
    }
    public function edit($id){
        $instructor = Instructor::find($id);
        return view('admin.edit-instructor',compact('instructor'));
    }


    public function update(Request $request , $id){

      

        $instrucor = Instructor::find($id);
        $instrucor->name = $request->name;
        $instrucor->email = $request->email;
        $instrucor->phone = $request->phone;
        $instrucor->function = $request->function;
        $instrucor->date_of_birth = $request->date_of_birth;
        $instrucor->save();

        return redirect('dashboard-admin/instructors');
        
    }

    public function destroy($id){
        $instructor = Instructor::find($id);
        $instructor->delete();
        return redirect('dashboard-admin/instructors');
    }
}
