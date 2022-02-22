<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Courseinstructor;
use App\Models\Courselanguage;
use App\Models\Image;
use App\Models\Instructor;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;
use Illuminate\Http\Request;
use App\Models\Language;

class CourseController extends Controller
{
    //
  
    public function create(){

        $categories = Category::where('parent_id',null)->get();
        $instructors = Instructor::all();
        $languages = Language::all();
        return view('admin.add-course',compact('categories','instructors','languages'));
    }

    public function index(){
        $courses = Course::with('category')->get();
        return view ('admin.courses',compact('courses'));
    }
    
    public function store(Request $request){
       
        $course = new Course();
        $hasFile = $request->hasFile('photos');
        $lien = [];
        $course->name = $request->name;
        $course->price = $request->price;
        $course->categorie_id = $request->category;
       
        $course->level = $request->level;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->duration = $request->duration;
        $course->nbr_student = $request->nbr_student;
        $course->status = $request->status;
        $course->description = $request->description;
        $course->certificate = $request->certificate;
        $course->check = $request->check;
        $course->filiere = $request->filiere;
        $course->old_price = $request->old_price;
        $course->save();


        if($request->instructors){
            foreach($request->instructors as $instructor){
                $course_instructor = new Courseinstructor();
                $course_instructor->course_id = $course->id;
                $course_instructor->instructor_id = $instructor;
                $course->courseInstructor()->save($course_instructor);
            }

        }
     

        foreach($request->languages as $language){
            $course_language = new Courselanguage();
            $course_language->course_id = $course->id;
            $course_language->language_id = $language;
            $course->courseLanguage()->save($course_language);
        }
        if($hasFile){
            foreach($request->file('photos') as $file){
            $path =  $file;
            $name = $path->store('course');
            $lien = Storage::putFile('course',$path); 
           
            $fileModal = new Image();
            $fileModal->lien = $lien;
         
            $course->images()->save($fileModal);
         }
        }
        return redirect('dashboard-admin/courses');
    }

    public function edit($id){
        $course = Course::find($id);
        $categories = Category::where('parent_id',null)->get();
        $instructors = Instructor::all();
        $languages = Language::all();
        $courselanguages = Courselanguage::where('course_id',$id)->get();
        $courseinstructors = Courseinstructor::where('course_id',$id)->get();
        return view('admin.edit-course',compact('course','categories','instructors','languages','courseinstructors','courselanguages'));
    }

    public function update(Request $request,$id){

        $course = Course::find($id);
        $hasFile = $request->hasFile('photos');
        $countLigneInstructor = Courseinstructor::where('course_id',$id)->count();
        $countLigneLanguage = Courselanguage::where('course_id',$id)->count();
        $lien = [];
        $course->name = $request->name;
        $course->price = $request->price;
        $course->categorie_id = $request->category;
        $course->level = $request->level;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->duration = $request->duration;
        $course->nbr_student = $request->nbr_student;
        $course->status = $request->status;
        $course->description = $request->description;
        $course->certificate = $request->certificate;
        $course->check = $request->check;
        $course->filiere = $request->filiere;
        $course->old_price = $request->old_price;
        $course->save();
       
        if($request->instructors){
            $course_instructors = Courseinstructor::where('course_id',$id)->get();
            foreach($course_instructors as $course_instructor){
                $course_instructor->delete();
            }
            
          foreach($request->instructors as $instructor){
            
            $course_instructor = new Courseinstructor();
           
            $course_instructor->course_id = $id;
            $course_instructor->instructor_id = $instructor;
            $course->courseInstructor()->save($course_instructor);
            
        }
       
        }
       
        if($request->languages){

            $course_languages = Courselanguage::where('course_id',$id)->get();
            foreach($course_languages as $course_language){

                $course_language->delete();
             }
            foreach($request->languages as $language){
            $course_language = new Courselanguage();
            $course_language->course_id = $id;
            $course_language->language_id = $language;
            $course->courseLanguage()->save($course_language);
        }
    }
       

        if($hasFile){
            $image = Image::where('course_id',$id)->count();
            if($image == 0){
                foreach($request->file('photos') as $file){
                    $path =  $file;
                    $name = $path->store('course');
                    $lien = Storage::putFile('course',$path); 
                   
                   
                    $fileModal = new Image();
                    $fileModal->lien = $lien;
                 
                    
                 }
                  $course->images()->save($fileModal);

            }
            else{
                foreach($request->file('photos') as $file){
                    $path =  $file;
                    $name = $path->store('course');
                    $lien = Storage::putFile('course',$path); 
                   
                   
                    $fileModal = Image::where('course_id',$id)->first();
                    $fileModal->lien = $lien;
                 
                    
                 }
                  $course->images()->save($fileModal);
            }
            
        }
        return redirect('dashboard-admin/courses');
    }


    public function courseDetail($id){
        $course = Course::find($id);
        $medias = $course->images;
        $categories = Category::all();
      
        return view('course-detail',compact('course','medias','categories'));
    }


     public function destroy($id){

        $course = Course::find($id);
        $instructors = CourseInstructor::where('course_id',$id)->get();
        $languages = Courselanguage::where('course_id',$id)->get();
        foreach($instructors as $instructor){
            $instructor->delete();
        }
        foreach($languages as $language){
            $language->delete();
        }

        $course->delete();
        return redirect('dashboard-admin/courses');

     }

     public function categoryCourses($id){

        $courses = Course::where('categorie_id',$id)->get();
        $categories = Category::all();
        $category = Category::find($id);
        return view('category-courses',compact('courses','categories','category'));

     }

    
}
