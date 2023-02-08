<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Finalregistration;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Http\Request;

class EmailingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $courses = Course::all();
        return view('admin.emailing',compact('courses'));
    }

    public function exportEmail($id)
   {
    $fileName = 'emailing.csv';
    $students = Finalregistration::where('course_id',$id)->get();
    

            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array('Email :');

            $callback = function() use($students, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($students as $student) {
                    $row['email']  = $student->user->email;
                    
                    fputcsv($file, array($row['email']));
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
    }
    public function exportAllEmail()
   {
    $fileName = 'emailing.csv';
    $students = User::where('type','student')->get();
           $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array('Emails :');

            $callback = function() use($students, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($students as $student) {
                    $row['email']  = $student->email;
                    
                    fputcsv($file, array($row['email']));
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
    }

    public function exportEmailPresInscription(){
        $fileName = 'emailing.csv';
        $registrations = Registration::all();
           $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array('Emails :');

            $callback = function() use($registrations, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($registrations as $registration) {
                    $row['email']  = $registration->email;
                    
                    fputcsv($file, array($row['email']));
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);

    }
}
