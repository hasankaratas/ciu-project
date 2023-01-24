<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Department;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        return view('student.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departments = Department::all();
        $validate = $request->validate([
            'department' => 'required',
            'name' => 'required|min:2|max:255',
            'surname' => 'required|min:2|max:255',
            'student_no' => 'required|min:8|max:8',
            'email' => 'required|email|min:2|max:255',
            'phone_number' => 'required|min:10|max:11',
            'passport_no' => 'required|min:10|max:255',
            'country' => 'required|min:2|max:255',
        ]);

        $student = Student::create([
            'department_id' => $request->department,
            'name' => $request->name,
            'surname' => $request->surname,
            'student_no' => $request->student_no,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'passport_no' => $request->passport_no,
            'country' => $request->country,
        ]);
        return view('student.create', compact('departments', 'student'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $departments = Department::all();
        return view("student.edit", compact("student", "departments"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $departments = Department::all();
        $validate = $request->validate([
            'department_id' => 'required',
            'name' => 'required|min:2|max:255',
            'surname' => 'required|min:2|max:255',
            'student_no' => 'required|min:8|max:8',
            'email' => 'required|email|min:2|max:255',
            'phone_number' => 'required|min:10|max:11',
            'passport_no' => 'required|min:10|max:255',
            'country' => 'required|min:2|max:255',
        ]);

        $student = Student::find($id);
        $student->fill($request->all())->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if (isset($student)) {
            $student->delete();
            return "deleted";
        }else{
            return "Bu kayıt bulunamadı!";
        }
    }
}
