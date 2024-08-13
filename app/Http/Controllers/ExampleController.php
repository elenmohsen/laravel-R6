<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class ExampleController extends Controller
{
    function login(){
        return view('login');
    }

    function cv(){
        return view('cv');
    }

    function contactus(){
        return view('contactus');
    }

    function personaldata(Request $request){
        $name= $request->name;
        $email= $request->email;
        $subject= $request->subject;
        $message= $request->message;
        return $name . "<br>" . $email . "<br>" . $subject . "<br>" . $message;
    }

    function uploadform(){
        return view('upload');
    }

    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }
//new project
    public function index(){
        return view('index');
    }


    public function about(){
        return view('about');
    }

    public function studentresult(){
        return view('studentresults');
    }

    public function test(){
        //dd(Student::find(2)?->phone->phone_number);
       dd( DB::table('students')
            ->join('phones', 'phones.id', '=', 'students.phone_id')
            ->where('students.id', '=', 2)
            ->first() 
    );
}

}

