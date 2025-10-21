<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Validation\Rule;

class StudentsController extends Controller
{
    public function create()
    {
        $cities = City::all();
        return view('students.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'required|digits:11|unique:students,phone',
            'address' => 'required|string|min:5|max:255',
            'city_id' => 'required|exists:cities,id'
        ]);

        Student::create($request->all());
        return back()->with('success', 'Student added successfully');
    }

     public function index()
    {
        $students = Student::with('city')->orderByDesc('created_at')->paginate(5);
        return view('students.index', compact('students'));
    }



    public function show(Student $student) 
    {
        //$student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $cities = City::all();
        return view('students.edit', compact('student', 'cities'));
    }


    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($student->id)
            ],
            'phone' => [
                'required',
                'digits:11',
                Rule::unique('students', 'phone')->ignore($student->id)
            ],
            'address' => 'required|string|min:5|max:255',
            'city_id' => 'required|exists:cities,id'
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    public function destroy(Student $student) 
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }

}
