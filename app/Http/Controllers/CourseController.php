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

class CourseController extends Controller
{
    //
  
    public function create(){

        $categories = Category::where('parent_id',null)->get();
        $instructors = Instructor::all();
        
        return view('admin.add-course',compact('categories','instructors'));
    }

    public function index(){
        $courses = Course::with('instructor','category')->get();
        return view ('admin.courses',compact('courses'));
    }
    
    public function store(Request $request){
       
        $course = new Course();
        $hasFile = $request->hasFile('photos');
        $lien = [];
        $course->name = $request->name;
        $course->price = $request->price;
        $course->category_id = $request->category;
       
        $course->level = $request->level;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->duration = $request->duration;
        $course->nbr_student = $request->nbr_student;
        $course->status = $request->status;
        $course->description = $request->description;
        $course->certificate = $request->certificate;
       
        $course->save();

        foreach($request->instructors as $instructor){
            $course_instructor = new Courseinstructor();
            $course_instructor->course_id = $course->id;
            $course_instructor->instructor_id = $instructor;
            $course_instructor->save();
        }

        foreach($request->languages as $language){
            $course_language = new Courselanguage();
            $course_language->course_id = $course->id;
            $course_language->language = $language;
            $course_language->save();
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
        return view('admin.edit-course',compact('course','categories','instructors'));
    }

    public function update(Request $request,$id){

        $course = Course::find($id);
        $hasFile = $request->hasFile('photos');
        $lien = [];
        $course->name = $request->name;
        $course->price = $request->price;
        $course->category_id = $request->category;
        $course->instructor_id = $request->instructor;
        $course->language = $request->language;
        $course->level = $request->level;
        $course->start_date = $request->start_date;
        $course->end_date = $request->end_date;
        $course->duration = $request->duration;
        $course->nbr_student = $request->nbr_student;
        $course->status = $request->status;
        $course->description = $request->description;
        $course->certificate = $request->certificate;
        $course->save();
        if($hasFile){
            foreach($request->file('photos') as $file){
            $path =  $file;
            $name = $path->store('course');
            $lien = Storage::putFile('course',$path); 
           
            $fileModal = Image::where('course_id',$id);
            $fileModal->lien = $lien;
         
            $course->images()->save($fileModal);
         }
        }
        return redirect('dashboard-admin/courses');
    }


    public function courseDetail($id){
        $course = Course::find($id);
        $medias = $course->images;
      
        return view('course-detail',compact('course','medias'));
    }


     public function destroy($id){

        $course = Course::find($id);
        $course->delete();
        return redirect('dashboard-admin/courses');

     }

     public function categoryCourses($id){

        $courses = Course::where('category_id',$id)->get();
        $categories = Category::all();
        $category = Category::find($id);
        return view('category-courses',compact('courses','categories','category'));

     }

    
}
