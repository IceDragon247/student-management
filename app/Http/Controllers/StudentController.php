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
        return view('students.add', ['batches' => Batch::all()]);
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
}
