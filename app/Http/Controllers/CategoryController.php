<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function create(){

      
        
        $categories = Category::where('parent_id',null)->get();
        
        return view('admin.add-category',compact('categories'));
    }

    public function index(){
        
        $categories = Category::where('parent_id',null)->orderby('name', 'asc')->get();
        $countcategory = Category::count();
        return view('admin/categories',compact('categories','countcategory'));
    }

    public function store(Request $request){

        $request->validate([
         'name' => ['required', 'string', 'max:255'],
         'category' => ['required', 'string', 'max:255']

        ]);
         $category = new Category();
         $category->name=$request['name'];

         if($request['category'] == 0){
          $category->parent_id == NULL;
         }
         else{
             $category->parent_id = $request['category'];
         }
         $category->save();
         return redirect('dashboard-admin/category')->with('success','Category ajouter avec succes');
    }
}
