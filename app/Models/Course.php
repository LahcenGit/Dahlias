<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $cascadeDeletes = ['images'];
    protected $dates = ['deleted_at'];


    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function courseLanguage(){
        return $this->hasMany(Courselanguage::class);

    }

    public function courseInstructor(){
        return $this->hasMany(Courseinstructor::class);

    }


    public function registration()
    {
        return $this->hasMany(Registration::class);
    }

 

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

   public function getInstructor(){
       $instructor = null;
       $instructorcourse = Courseinstructor::where('course_id',$this->id)->get();
       //dd($instructorcourse);
       $instructor = Instructor::where('id',$instructorcourse->instructor_id)->get();
       return $instructor->name;
   }


   public function languages()
   {
       return $this->belongsToMany(Language::class, 'courselanguages');
   }


}
