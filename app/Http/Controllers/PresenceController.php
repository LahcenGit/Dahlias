<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Finalregistration;
use App\Models\Group;
use App\Models\Presence;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $sessions = Presence::selectRaw('session')
                              ->selectRaw('course_id')
                              ->selectRaw('group_id')
                              ->groupBy('session')
                              ->groupBy('course_id')
                              ->groupBy('group_id')
                              ->get()
                              ->reverse();
        
        return view('admin.sessions',compact('sessions'));
    }

    public function stepOne(){
        $courses = Course::all();
        return view('admin.add-presence-step-one',compact('courses'));
    }
    public function stepTwo($course_id, $group_id ,$session,$date){
        $course = Course::find($course_id);
        $group = Group::find($group_id);
        $students = Finalregistration::where('course_id',$course_id)->where('group_id',$group_id)->get();
        return view('admin.add-presence-step-two',compact('course','group','students','session','date'));
    }

    public function storPresence(Request $request){
       
        $students = Finalregistration::where('course_id',$request->course)->where('group_id',$request->group)->get();
        foreach($students as $student){
            $user_id=  $student->user_id;
            $presence = new Presence();
            $presence->user_id = $student->user->id;
            $presence->course_id = $request->course;
            $presence->group_id = $request->group;
            $presence->date = $request->date;
            $presence->session = $request->session;
            if($request[$user_id]){
                $presence->present = 1;
            }
            else{
                $presence->present = 0;
            }
            $presence->save();
           
        }
        return redirect('dashboard-admin/sessions');
    }

    public function getPresences($course_id , $group_id , $session){
        $presences = Presence::where('course_id',$course_id)->where('group_id',$group_id)->where('session',$session)->get();
        return view('admin.presences',compact('presences'));
    }

    public function edit($course_id , $group_id , $session){
        $presences = Presence::where('course_id',$course_id)->where('group_id',$group_id)->where('session',$session)->get();
        return view('admin.edit-presences',compact('presences'));
    }

    public function update(Request $request){
        $presences = Presence::where('course_id',$request->course)->where('group_id',$request->group)->get();
        foreach($presences as $presence){
            $user_id =  $presence->user_id;
            
            $presence = Presence::find($presence->id);
            if($request[$user_id]){
                $presence->present = 1;
            }
            else{
                $presence->present = 0;
            }
            $presence->save();
           
        }
        return redirect('dashboard-admin/sessions');
       
    }
}
