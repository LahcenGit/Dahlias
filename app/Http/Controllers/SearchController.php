<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function globalSearch(Request $request){
        $categories = Category::where('parent_id',null)->orderby('name', 'asc')->get();
        $keyword = $request->keyword;

        $courses  = Course::where('name', 'LIKE', "%{$keyword}%") 
        ->orWhere('description', 'LIKE', "%{$keyword}%") 
        ->get();

        return view('search-result',compact('courses','categories','keyword')) ;
    }
}
