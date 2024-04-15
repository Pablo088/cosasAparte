<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $student = Student::All();
        return view("student",compact("student"));
    }
    public function edit($id){
        $student = Student::find($id);
        return view("ABM.edit", compact("student"));
    }
    public function update(Request $request,$student){
        $students = Student::find($student);
       
        $students->dni = $request->dni;
        $students->name = $request->name;
        $students->lastName = $request->lastName;
        $students->birthDate = $request->birthDate;

        $students->save();

        return redirect()->route("student.index", $student);
    }
    public function destroy($id){
        $student = Student::find($id);
        $student->delete();
        return redirect()->route("student.index");
    }
}