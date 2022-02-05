<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailContact;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('contact',compact('categories'));
    }
    public function store(Request $request){

        Mail::to('lahcenebenmouloud@gmail.com')->send(new MailContact($request));
        return 1;
    }
}
