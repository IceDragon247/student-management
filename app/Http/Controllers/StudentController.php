<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Batch;

class StudentController extends Controller
{
    public function index(Request $request){
        return view('students.index', ['students' => Student::all()]);
    }

    public function show(Request $request, $id) {
        $student = Student::find($id);
        if (is_null($student))
            abort(404);

        return view('students.show', ['student' => $student]);
    }

    public function add(Request $request) {
        return view('students.add', ['edit' => false, 'student' => newStudent(), 'batches' => Batch::all()]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'lastName' => 'required',
            'firstName' => 'required',
            'dob' => 'required|date',
            'gender' => 'boolean',
            'batch_id' => 'required|exists:batches,id',
        ]);
        $validated['gender'] =  $validated['gender'] ?? 0;

        $student = Student::create($validated);
        return redirect('/students');
    }

    public function delete(Request $request, $id) {
        $student = Student::find($id);
        if (is_null($student))
            abort(404);

        $student -> delete();
        return redirect('/students');
    }

    public function edit(Request $request, $id) {
        $student = Student::find($id);
        if (is_null($student))
            abort(404);

        return view('students.add', ['edit' => true, 'student' => $student , 'batches' => Batch::all()]);
    }

    public function update(Request $request, $id) {
        $student = Student::find($id);
        if (is_null($student))
            abort(404);
        
        $validated = $request->validate([
            'lastName' => 'required',
            'firstName' => 'required',
            'dob' => 'required|date',
            'gender' => 'boolean',
            'batch_id' => 'required|exists:batches,id',
        ]);
        $validated['gender'] =  $validated['gender'] ?? 0;

        $student->fill($validated);
        $student->save();
        return redirect('/students/'.$student->id);
    }
}
