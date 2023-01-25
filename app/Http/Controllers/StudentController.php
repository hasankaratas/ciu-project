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
            'name' => 'required|min:2|max:255|alpha',
            'surname' => 'required|min:2|max:255|alpha',
            'student_no' => 'required|min:8|max:8',
            'email' => 'required|email|min:2|max:255',
            'phone_number' => 'required|min:10|max:11',
            'passport_no' => 'required|min:10|max:11',
            'country' => 'required|min:2|max:255|alpha',
        ],
        [
            'department.required'  => 'Bölüm alanı zorunludur!',
            'name.required'  => 'İsim alanı zorunludur!',
            'name.alpha'  => 'İsim alanına sadece karakter girilmelidir!',
            'name.min'  => 'İsim alanına en az 2 karakter girilmelidir!',
            'name.max'  => 'İsim alanı en fazla 255 karakter girilebilir!',
            'surname.required'  => 'Soyisim alanı zorunludur!',
            'surname.alpha'  => 'Soyisim alanına sadece karakter girilmelidir!',
            'surname.min'  => 'Soyisim alanına en az 2 karakter girilmelidir!',
            'surname.max'  => 'Soyisim alanı en fazla 255 karakter girilebilir!',
            'student_no.required'  => 'Öğrenci numarası alanı zorunludur!',
            'student_no.min'  => 'Öğrenci numarası alanına en az 8 karakter girilmelidir!',
            'student_no.max'  => 'Öğrenci numarası alanı en fazla 8 karakter girilebilir!',
            'email.required'  => 'Email alanı zorunludur!',
            'email.email'  => 'Email alanına geçerli formatta bir email adresi girilmelidir!',
            'email.min'  => 'Email alanına en az 2 karakter girilmelidir!',
            'email.max'  => 'Email alanı en fazla 255 karakter girilebilir!',
            'phone_number.required'  => 'Telefon Numarası alanı zorunludur!',
            'phone_number.min'  => 'Telefon Numarası alanına en az 10 karakter girilmelidir!',
            'phone_number.max'  => 'Telefon Numarası alanı en fazla 11 karakter girilebilir!',
            'passport_no.required'  => 'Pasaport Numarası alanı zorunludur!',
            'passport_no.min'  => 'Pasaport Numarası alanına en az 10 karakter girilmelidir!',
            'passport_no.max'  => 'Pasaport Numarası alanı en fazla 11 karakter girilebilir!',
            'country.required'  => 'Ülke alanı zorunludur!',
            'country.min'  => 'Ülke alanına en az 2 karakter girilmelidir!',
            'country.max'  => 'Ülke alanı en fazla 255 karakter girilebilir!',
            'country.alpha'  => 'Ülke alanına sadece karakter girilmelidir!',
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
            'name' => 'required|min:2|max:255|alpha',
            'surname' => 'required|min:2|max:255|alpha',
            'student_no' => 'required|min:8|max:8',
            'email' => 'required|email|min:2|max:255',
            'phone_number' => 'required|min:10|max:11',
            'passport_no' => 'required|min:10|max:255',
            'country' => 'required|min:2|max:255|alpha',
        ],
        [
            'department.required'  => 'Bölüm alanı zorunludur!',
            'name.required'  => 'İsim alanı zorunludur!',
            'name.alpha'  => 'İsim alanına sadece karakter girilmelidir!',
            'name.min'  => 'İsim alanına en az 2 karakter girilmelidir!',
            'name.max'  => 'İsim alanı en fazla 255 karakter girilebilir!',
            'surname.required'  => 'Soyisim alanı zorunludur!',
            'surname.alpha'  => 'Soyisim alanına sadece karakter girilmelidir!',
            'surname.min'  => 'Soyisim alanına en az 2 karakter girilmelidir!',
            'surname.max'  => 'Soyisim alanı en fazla 255 karakter girilebilir!',
            'student_no.required'  => 'Öğrenci numarası alanı zorunludur!',
            'student_no.min'  => 'Öğrenci numarası alanına en az 8 karakter girilmelidir!',
            'student_no.max'  => 'Öğrenci numarası alanı en fazla 8 karakter girilebilir!',
            'email.required'  => 'Email alanı zorunludur!',
            'email.email'  => 'Email alanına geçerli formatta bir email adresi girilmelidir!',
            'email.min'  => 'Email alanına en az 2 karakter girilmelidir!',
            'email.max'  => 'Email alanı en fazla 255 karakter girilebilir!',
            'phone_number.required'  => 'Telefon Numarası alanı zorunludur!',
            'phone_number.min'  => 'Telefon Numarası alanına en az 10 karakter girilmelidir!',
            'phone_number.max'  => 'Telefon Numarası alanı en fazla 11 karakter girilebilir!',
            'passport_no.required'  => 'Pasaport Numarası alanı zorunludur!',
            'passport_no.min'  => 'Pasaport Numarası alanına en az 10 karakter girilmelidir!',
            'passport_no.max'  => 'Pasaport Numarası alanı en fazla 11 karakter girilebilir!',
            'country.required'  => 'Ülke alanı zorunludur!',
            'country.min'  => 'Ülke alanına en az 2 karakter girilmelidir!',
            'country.max'  => 'Ülke alanı en fazla 255 karakter girilebilir!',
            'country.alpha'  => 'Ülke alanına sadece karakter girilmelidir!',
        ]);

        $student = Student::find($id);
        $student->fill($request->all())->save();
        return back()->with('success','başarılı');
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
