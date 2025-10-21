<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Validation\Rule;

class StudentsController extends Controller
{
    public function create() {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'required|digits:11|unique:students,phone',
            'address' => 'required|string|min:5|max:255'
        ]);

        Student::create($request->all());
        return back()->with('success', 'Student added successfully');
    }

    public function index() 
    {
        //$students = Student::orderBy('created_at', 'desc')->paginate(5);
        //или
        $students = Student::orderBy('created_at')->paginate(5);
        return view('students.index', compact('students'));
    }

    public function show(Student $student) 
    {
        //$student = Student::findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
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
