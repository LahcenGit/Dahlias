<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
   
    public function categories(){

        return $this->hasMany(Category::class,'parent_id');
   }
   
   public function childCategories()
   {
       return $this->hasMany(Category::class, 'parent_id')->with('categories');
   }


   public function parent()
   {
           return $this->belongsTo(Category::class, 'parent_id');
   }

    public function courses(){

        return $this->hasMany(Course::class);
   }
}
