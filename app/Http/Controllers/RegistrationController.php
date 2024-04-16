<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use TheHocineSaad\LaravelAlgereography\Models\Wilaya;

class RegistrationController extends Controller
{
    //
    public function index(){
        return view('home');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:registrations'],
            'phone' => ['required', 'string', 'unique:registrations'],
            'filiere' => 'required',
            'age' => 'required',
            'place_birth' => 'required',
            'function' => 'required',
            'sexe' => 'required',
           
        ],
        [
            'email.unique' => 'Ce email existe déja',
            'email.email' => 'e-mail doit être une adresse e-mail valide.',
            'phone.unique' => 'Ce numéro existe déja',
            'phone.required' =>'Ce champ est obligatoire',
            'name.required' =>'Ce champ est obligatoire',
            'filiere.required' =>'Ce champ est obligatoire',
            'place_birth.required' =>'Ce champ est obligatoire',
            'function.required' =>'Ce champ est obligatoire',
            'sexe.required' =>'Ce champ est obligatoire',
            
            
        ]);
         $registration = new Registration();
         $registration->course_id = $request->course;
         $registration->name = $request->name;
         $registration->email = $request->email;
         $registration->filiere = $request->filiere;
         $registration->age = $request->age;
         $registration->remarque = $request->remarque;
         $registration->phone = $request->phone;
         $registration->place_birth = $request->place_birth;
         $registration->status = 1;
         $registration->accept = $request->accept;
         $registration->function = $request->function;
         $registration->sexe = $request->sexe;
         $registration->cause = $request->cause;
         $registration->flag = 0;
         $registration->save();
         $name = $request->name;
         $categories = Category::all();
         return view('register-success',compact('name','categories'));
    }

    public function register($id){
        $course = Course::find($id);
        $categories = Category::all();
        $wilayas = Wilaya::all();
        return view('register-course',compact('course','categories','wilayas'));
    }


    public function registerSuccess($id,$name){
        $course = Course::find($id);
        $categories = Category::all();
        return view('register-course',compact('course','categories'));
    }

    public function modalRegistration(){
        $courses = Course::all();
        return view('admin.modal-registration',compact('courses'));
    }
   
    public function addRegistration(Request $request){

        $registration = new Registration();
        $registration->course_id = $request->course;
        $registration->name = $request->name;
        $registration->email = $request->email;
        $registration->age = $request->age;
        $registration->remarque = $request->remarque;
        $registration->phone = $request->telephone;
        $registration->status = 1;
        $registration->save();

        
        return $registration;
   }


  
}
