<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

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
         $category->description = $request['description'];

         if($request['category'] == 0){
          $category->parent_id == NULL;
         }
         else{
             $category->parent_id = $request['category'];
         }
         $category->save();
         return redirect('dashboard-admin/category')->with('success','Category ajouter avec succes');
    }


    public function edit($id){
        $category = Category::find($id);
       
        $categories = Category::where('parent_id',null)->get();
        return view("admin.edit-category",compact('category','categories'));
    }



    public function update(Request $request, $id){
        $category = Category::find($id);
      
        $category->name=$request['name'];
        $category->description = $request['description'];
       
        if($request['category'] == 0){
           
         $category->parent_id = NULL;
        
         $category->save();
        }
        else{
            $category->parent_id = $request['category'];
        }
        $category->save();
        return redirect('dashboard-admin/category')->with('success','Category updated successfully');
    }


    public function destroy($id){

        $category = Category::find($id);
        $childCategories = Category::where('parent_id',$id)->get();
        foreach($childCategories as $childCategory){
            $childCategory->parent_id = null;
            $childCategory->save();
        }
        $category->delete();

               
       return redirect('dashboard-admin/category');  
       

   }
}
