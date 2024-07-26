<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class TeacherController extends Controller
{
    public function index(){
        return view('login');
    }
    public function login_verify(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $auth = User::where('email',$request->email)->get();
        // return $auth;
        if($auth && Hash::check($request->password, $auth[0]->password)){
            session()->put('email',$auth[0]->email);
            session()->put('uid',$auth[0]->id);
            return redirect()->route('student-list');

        }else{
            return redirect()->route('index')->with('error',"Invalid credential!");
        }
    }
    public function student_list(){
        $data['list'] = Student::all();
        return view('student_list',$data);
    }

    public function add_student(Request $request){
        $name = $request->name;
        $marks = $request->marks;
        $subject = $request->subject;
        if(empty($name)){
            return response()->json(['msg'=>'Student name can`t be blank!','status'=>false],200);
        }
        if(empty($subject)){
            return response()->json(['msg'=>'Student subject can`t be blank!','status'=>false],200);
        }        
        if(empty($marks)){
            return response()->json(['msg'=>'Student marks can`t be blank!','status'=>false],200);
        }

        $student = new Student();

        $ExistSubjectMarks = Student::where('name',$name)->where('subject',$subject)->get();
        if(count($ExistSubjectMarks)>0){
            $exist_std = Student::find($ExistSubjectMarks[0]->id);
            $exist_std->marks = $marks;
            $exist_std->save();
            return response()->json(['msg'=>'One record updated!','status'=>true],200);
        }
        else{
            $student->name = $name;
            $student->subject = $subject;
            $student->marks = $marks;
            $student->created_at = Carbon::now();
            $student->updated_at = Carbon::now();
            $student->save();
            return response()->json(['msg'=>'One record inserted!','status'=>true],200);
        }

    }

    public function logout(){
        session()->forget(['email','uid']);
        return redirect()->route('index');
    }


}
