<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationAdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $registrations = Registration::with('course')->get()->reverse();
        return view('admin.registrations',compact('registrations'));
    }

    public function edit($id){
        $registration = Registration::with('course')->where('id',$id)->first();
       
        return view('admin.edit-registration',compact('registration'));
    }

    public function update(Request $request, $id){
          $registration = Registration::find($id);
          $registration->name = $request->name;
          $registration->phone = $request->phone;
          $registration->age = $request->age;
          $registration->status = $request->status;
          $registration->remark = $request->remark;
          $registration->save();
          
          return redirect('dashboard-admin/registrations');
    }


    public function destroy($id){
        $registration = Registration::find($id);
        $registration->delete();
        return redirect('dashboard-admin/registrations');

    }
    

    
}
