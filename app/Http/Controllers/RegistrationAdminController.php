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
        $registrations = Registration::with('course')->orderBy('created_at','desc')->get();
        return view('admin.registrations',compact('registrations'));
    }

    public function edit($id){
        $registration = Registration::with('course')->where('id',$id)->first();
       
        return view('admin.edit-registration',compact('registration'));
    }

    public function updateRegistration(Request $request, $id){
          $registration = Registration::find($id);
          $registration->name = $request->name;
          $registration->email = $request->email;
          $registration->age = $request->age;
          $registration->remarque = $request->remarque;
          $registration->phone = $request->phone;
          $registration->place_birth = $request->place_birth;
          $registration->status = 1;
          $registration->accept = $request->accept;
          $registration->function = $request->fonction;
          $registration->sexe = $request->genre;
          $registration->status = $request->status;
          $registration->cause = $request->cause;
          $registration->remark = $request->remark;
          $registration->save();
          
          return $registration;
    }


    public function destroy($id){
        $registration = Registration::find($id);
        $registration->delete();
        return redirect('dashboard-admin/registrations');

    }

    public function editStatus($id){
        $registration = Registration::find($id);
        return view('admin.modal-edit-status',compact('registration'));
    }
    

    
}
