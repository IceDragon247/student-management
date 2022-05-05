<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Grade;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(Request $request){
        return view('grades.index', ['grades' => Grade::all()]);
    }

    public function show(Request $request, $student_id,  $subject_id) {
        $grade = Grade::where('student_id', $student_id)->where('subject_id', $subject_id)->first();
        if (is_null($grade))
            abort(404);

        return view('grades.show', ['grade' => $grade]);
    }

    public function add(Request $request) {
        return view('grades.add', ['edit' => false, 'grade' => new Grade(), 'student' => Student::all(), 'subject' => Subject::all()]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'firstGrade' => 'required',
            'secondGrade' => 'required',
        ]);

        $grade = Grade::create($validated);
        return redirect('/grades');
    }

    public function delete(Request $request, $student_id,  $subject_id) {
        $grade = Grade::where('student_id', $student_id)->where('subject_id', $subject_id)->first();
        if (is_null($grade))
            abort(404);

        $grade -> delete();
        return redirect('/grades');
    }

    public function edit(Request $request, $student_id,  $subject_id) {
        $grade = Grade::where('student_id', $student_id)->where('subject_id', $subject_id)->first();
        if (is_null($grade))
            abort(404);

        return view('grades.add', ['edit' => true, 'grade' => $grade , 'students' => Student::all(), 'subject' => Subject::all()]);
    }

    public function update(Request $request, $student_id,  $subject_id) {
        $grade = Grade::where('student_id', $student_id)->where('subject_id', $subject_id)->first();
        if (is_null($grade))
            abort(404);
        
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
            'firstGrade' => 'required',
            'secondGrade' => 'required',
        ]);

        Grade::where('student_id', $student_id)
        ->where('subject_id', $subject_id)
        ->update($validated);
        return redirect("/grades/{$student_id}/{$subject_id}");
    }
}
